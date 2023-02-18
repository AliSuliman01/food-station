<?php


namespace App\Modules\Ingredients\ViewModels;

use App\Modules\Ingredients\Model\Ingredient;
use Illuminate\Contracts\Support\Arrayable;

class GetIngredientVM implements Arrayable
{

    private $ingredient;

    public function __construct($ingredient)
    {
        $this->ingredient = $ingredient;
    }

    public function toArray()
    {
        return  $this->ingredient;
    }
}
