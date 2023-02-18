<?php

namespace App\Modules\Ingredients\Actions;

use App\Modules\Ingredients\Model\Ingredient;
use App\Modules\Ingredients\DTO\IngredientDTO;

class UpdateIngredientAction
{
    public static function execute(
        Ingredient $ingredient,IngredientDTO $ingredientDTO
    ){
        $ingredient->update(array_null_filter($ingredientDTO->toArray()));
        return $ingredient;
    }
}
