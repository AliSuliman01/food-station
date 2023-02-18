<?php

namespace App\Modules\Ingredients\Actions;

use App\Modules\Ingredients\Model\Ingredient;

class DestroyIngredientAction
{
    public static function execute(
        Ingredient $ingredient
    ){
        $ingredient->delete();
        return $ingredient;
    }
}
