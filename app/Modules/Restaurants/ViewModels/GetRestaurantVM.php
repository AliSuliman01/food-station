<?php


namespace App\Modules\Restaurants\ViewModels;

use App\Modules\Restaurants\Model\Restaurant;
use Illuminate\Contracts\Support\Arrayable;

class GetRestaurantVM implements Arrayable
{

    private $restaurant;

    public function __construct($restaurant)
    {
        $this->restaurant = $restaurant->load(['user', 'products']);
    }

    public function toArray()
    {
        return  $this->restaurant;
    }
}
