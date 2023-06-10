<?php

namespace App\Modules\Restaurants\Actions;

use App\Modules\Restaurants\Model\Restaurant;

class DestroyRestaurantAction
{
    public static function execute(
        Restaurant $restaurant
    ) {
        $restaurant->delete();

        return $restaurant;
    }
}
