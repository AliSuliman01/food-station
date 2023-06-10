<?php

namespace App\Modules\Restaurants\Actions;

use App\Modules\Restaurants\DTO\RestaurantDTO;
use App\Modules\Restaurants\Model\Restaurant;

class StoreRestaurantAction
{
    public static function execute(
        RestaurantDTO $restaurantDTO
    ) {

        return Restaurant::create(array_null_filter($restaurantDTO->toArray()));
    }
}
