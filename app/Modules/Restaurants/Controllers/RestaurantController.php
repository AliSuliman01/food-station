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

class RestaurantController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return response()->json(Response::success((new GetAllRestaurantsVM())->toArray()));
    }

    public function show(Restaurant $restaurant){

        return response()->json(Response::success((new GetRestaurantVM($restaurant))->toArray()));
    }

    public function store(StoreRestaurantRequest $request){

        $data = $request->validated() ;

        $restaurantDTO = RestaurantDTO::fromRequest($data);

        $restaurant = StoreRestaurantAction::execute($restaurantDTO);

        $restaurant->updateRelation('images', $data['images'] ?? []);

        return response()->json(Response::success((new GetRestaurantVM($restaurant))->toArray()));
    }

    public function update(Restaurant $restaurant, UpdateRestaurantRequest $request){

        $data = $request->validated() ;

        $restaurantDTO = RestaurantDTO::fromRequest($data);

        $restaurant = UpdateRestaurantAction::execute($restaurant, $restaurantDTO);

        $restaurant->updateRelation('images', $data['images'] ?? []);

        return response()->json(Response::success((new GetRestaurantVM($restaurant))->toArray()));
    }

    public function destroy(Restaurant $restaurant){

        return response()->json(Response::success(DestroyRestaurantAction::execute($restaurant)));
    }

}
