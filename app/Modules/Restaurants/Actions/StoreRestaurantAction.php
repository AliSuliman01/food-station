<?php

namespace App\Modules\Restaurants\Actions;

use App\Modules\Restaurants\Model\Restaurant;
use App\Modules\Restaurants\DTO\RestaurantDTO;

class StoreRestaurantAction
{
    public static function execute(
    RestaurantDTO $restaurantDTO
    ){

        return Restaurant::create(array_null_filter($restaurantDTO->toArray()));
    }
}
