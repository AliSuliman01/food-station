<?php


namespace App\Modules\Ingredients\ViewModels;

use App\Modules\Ingredients\Model\Ingredient;
use Illuminate\Contracts\Support\Arrayable;

class GetAllIngredientsVM implements Arrayable
{
    public function toArray()
    {
        return Ingredient::query()->get();
    }
}
