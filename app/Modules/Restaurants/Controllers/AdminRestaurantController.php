<?php


namespace App\Modules\Restaurants\Controllers;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Restaurants\Model\Restaurant;
use App\Modules\Restaurants\Actions\StoreRestaurantAction;
use App\Modules\Restaurants\Actions\DestroyRestaurantAction;
use App\Modules\Restaurants\Actions\UpdateRestaurantAction;
use App\Modules\Restaurants\DTO\RestaurantDTO;
use App\Modules\Restaurants\Requests\StoreRestaurantRequest;
use App\Modules\Restaurants\Requests\UpdateRestaurantRequest;
use App\Modules\Restaurants\ViewModels\GetRestaurantVM;
use App\Modules\Restaurants\ViewModels\GetAllRestaurantsVM;
use App\Modules\Users\ViewModels\GetAllUsersVM;
use Illuminate\Support\Facades\Storage;

class AdminRestaurantController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('restaurants.admin.index', [
           'restaurants' => (new GetAllRestaurantsVM())->toArray()
        ]);
    }

    public function show(Restaurant $restaurant){

        return view('restaurants.admin.show', [
            'restaurant' => (new GetRestaurantVM($restaurant))->toArray()
        ]);
    }
    public function edit(Restaurant $restaurant){

        return view('restaurants.admin.edit', [
            'restaurant' => (new GetRestaurantVM($restaurant))->toArray(),
            'users' => (new GetAllUsersVM())->toArray()
        ]);
    }

    public function create(Restaurant $restaurant){

        return view('restaurants.admin.create', [
            'users' => (new GetAllUsersVM())->toArray()
        ]);
    }

    public function store(StoreRestaurantRequest $request){

        $data = $request->validated() ;

        $restaurantDTO = RestaurantDTO::fromRequest($data);

        if (isset($data['cover_image'])) {
            $image_path = Storage::disk('public')->putFile('restaurants', $data['cover_image']);

            $restaurantDTO->cover_image = "/storage/$image_path";
        }
        $restaurant = StoreRestaurantAction::execute($restaurantDTO);

        return back();
    }

    public function update(Restaurant $restaurant, UpdateRestaurantRequest $request){

        $data = $request->validated() ;

        $restaurantDTO = RestaurantDTO::fromRequest($data);

        if (isset($data['cover_image'])) {
            $image_path = Storage::disk('public')->putFile('restaurants', $data['cover_image']);

            $restaurantDTO->cover_image = "/storage/$image_path";
        }

        $restaurant = UpdateRestaurantAction::execute($restaurant, $restaurantDTO);

        return back();
    }

    public function destroy(Restaurant $restaurant){
        DestroyRestaurantAction::execute($restaurant);
        return redirect()->route('admin.restaurants.index');
    }

}
