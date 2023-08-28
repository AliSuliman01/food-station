<?php

namespace App\Modules\Ingredients\Actions;

use App\Enums\MediaCollectionEnum;
use App\Modules\Ingredients\Model\Ingredient;

class DestroyIngredientAction
{
    public static function execute(
        Ingredient $ingredient
    ) {
        $ingredient->clearMediaCollection(MediaCollectionEnum::IMAGE);
        $ingredient->delete();

        return $ingredient;
    }
}
