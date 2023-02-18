<?php


namespace App\Modules\Restaurants\ViewModels;

use App\Modules\Restaurants\Model\Restaurant;
use Illuminate\Contracts\Support\Arrayable;

class GetAllRestaurantsVM implements Arrayable
{
    public function toArray()
    {
        return Restaurant::with(['user', 'products'])
            ->when(request()->filter, function($query){
                $query->where('name','like','%' . request()->filter . '%');
            })
            ->latest()
            ->get();
    }
}
