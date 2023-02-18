<?php

namespace App\Modules\Restaurants\Actions;

use App\Modules\Restaurants\Model\Restaurant;
use App\Modules\Restaurants\DTO\RestaurantDTO;

class UpdateRestaurantAction
{
    public static function execute(
        Restaurant $restaurant,RestaurantDTO $restaurantDTO
    ){
        $restaurant->update(array_null_filter($restaurantDTO->toArray()));
        return $restaurant;
    }
}
