<?php


namespace App\Modules\Ingredients\Controllers;


use App\Helpers\Response;
use App\Helpers\Storage;
use App\Http\Controllers\Controller;
use App\Modules\Categories\ViewModels\GetLeafCategoriesVM;
use App\Modules\Ingredients\Model\Ingredient;
use App\Modules\Ingredients\Actions\StoreIngredientAction;
use App\Modules\Ingredients\Actions\DestroyIngredientAction;
use App\Modules\Ingredients\Actions\UpdateIngredientAction;
use App\Modules\Ingredients\DTO\IngredientDTO;
use App\Modules\Ingredients\Requests\StoreIngredientRequest;
use App\Modules\Ingredients\Requests\UpdateIngredientRequest;
use App\Modules\Ingredients\ViewModels\GetIngredientVM;
use App\Modules\Ingredients\ViewModels\GetAllIngredientsVM;

class AdminIngredientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {

        return view('ingredients.admin.index', [
            'ingredients' => (new GetAllIngredientsVM())->toArray()
        ]);
    }
    public function show(Ingredient $ingredient){

        return response()->json(Response::success((new GetIngredientVM($ingredient))->toArray()));
    }

    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.admin.edit', [
            'ingredient' => (new GetIngredientVM($ingredient))->toArray(),
            'categories' => (new GetLeafCategoriesVM())->toArray(),
        ]);
    }

    public function create()
    {
        return view('ingredients.admin.create',[
            'categories' => (new GetLeafCategoriesVM())->toArray(),
        ]);
    }

    public function store(StoreIngredientRequest $request){

        $data = $request->validated() ;

        $ingredientDTO = IngredientDTO::fromRequest($data);

        $ingredient = StoreIngredientAction::execute($ingredientDTO);

        $ingredient->categories()->sync([$data['category_id']]);

        $ingredient->translation()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'language_code' => 'ar',
        ]);

        $ingredient->images()->create([
            'path' => Storage::putFile('ingredients', $data['image'])
        ]);

        return redirect()->route('admin.ingredients.index');
    }

    public function update(Ingredient $ingredient, UpdateIngredientRequest $request){

        $data = $request->validated() ;

        $ingredientDTO = IngredientDTO::fromRequest($data);

        $ingredient = UpdateIngredientAction::execute($ingredient, $ingredientDTO);

        $ingredient->categories()->sync([$data['category_id']]);

        $ingredient->translation()->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        if (isset($data['image']))
            $ingredient->images()->first()->update(['path' => Storage::putFile('ingredients', $data['image'])]);

        return back();
    }

    public function destroy(Ingredient $ingredient){

        DestroyIngredientAction::execute($ingredient);
        return redirect()->route('admin.ingredients.index');

    }

}
