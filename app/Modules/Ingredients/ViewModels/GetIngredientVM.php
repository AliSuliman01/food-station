<?php

namespace App\Modules\Ingredients\ViewModels;

use Illuminate\Contracts\Support\Arrayable;

class GetIngredientVM implements Arrayable
{
    private $ingredient;

    public function __construct($ingredient)
    {
        $this->ingredient = $ingredient->load(['translation',
            'images',
            'categories', ]);
    }

    public function toArray()
    {
        return $this->ingredient;
    }
}
