<?php

namespace App\Modules\Ingredients\Actions;

use App\Modules\Ingredients\Model\Ingredient;
use App\Modules\Ingredients\DTO\IngredientDTO;

class StoreIngredientAction
{
    public static function execute(
    IngredientDTO $ingredientDTO
    ):Ingredient{

        return Ingredient::create(array_null_filter($ingredientDTO->toArray()));
    }
}
