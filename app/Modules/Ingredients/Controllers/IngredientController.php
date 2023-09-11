<?php

namespace App\Modules\Ingredients\Controllers;

use App\Enums\MediaCollectionEnum;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Ingredients\Actions\DestroyIngredientAction;
use App\Modules\Ingredients\Actions\StoreIngredientAction;
use App\Modules\Ingredients\Actions\UpdateIngredientAction;
use App\Modules\Ingredients\DTO\IngredientDTO;
use App\Modules\Ingredients\Model\Ingredient;
use App\Modules\Ingredients\Requests\StoreIngredientRequest;
use App\Modules\Ingredients\Requests\UpdateIngredientRequest;
use App\Modules\Ingredients\Resources\IngredientResource;
use App\Modules\Ingredients\ViewModels\GetAllIngredientsVM;
use App\Modules\Ingredients\ViewModels\GetIngredientVM;
use Illuminate\Support\Facades\Storage;

class IngredientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {

        return response()->json(Response::success(
            IngredientResource::collection(
                (new GetAllIngredientsVM())->toArray()
            )
        ));
    }

    public function show(Ingredient $ingredient)
    {

        return response()->json(Response::success((new GetIngredientVM($ingredient))->toArray()));
    }

    public function store(StoreIngredientRequest $request)
    {

        $data = $request->validated();

        $ingredientDTO = IngredientDTO::fromRequest($data);

        $ingredient = StoreIngredientAction::execute($ingredientDTO);

        $ingredient->updateRelation('translations', $data['translations']);

        $ingredient->addMedia(Storage::disk('public')->path($data['image']))
            ->toMediaCollection(MediaCollectionEnum::IMAGE);

        $ingredient->categories()->sync($data['categories']);

        return response()->json(Response::success((new GetIngredientVM($ingredient))->toArray()));
    }

    public function update(Ingredient $ingredient, UpdateIngredientRequest $request)
    {

        $data = $request->validated();

        $ingredientDTO = IngredientDTO::fromRequest($data);

        $ingredient = UpdateIngredientAction::execute($ingredient, $ingredientDTO);

        $ingredient->updateRelation('translations', $data['translations']);

        if (isset($data['image'])) {
            $ingredient->addMedia(Storage::disk('public')->path($data['image']))
                ->toMediaCollection(MediaCollectionEnum::IMAGE);
        }

        $ingredient->categories()->sync($data['categories']);

        return response()->json(Response::success((new GetIngredientVM($ingredient))->toArray()));
    }

    public function destroy(Ingredient $ingredient)
    {

        return response()->json(Response::success(DestroyIngredientAction::execute($ingredient)));
    }
}
