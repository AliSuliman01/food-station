<?php

namespace App\Modules\Products\ViewModels;

use Illuminate\Contracts\Support\Arrayable;

class LoadProductVM implements Arrayable
{
    private $product;

    public function __construct($product)
    {
        $this->product = $product->load([
            'main_image',
            'translation',
            'categories',
        ]);
    }

    public function toArray()
    {
        return $this->product;
    }
}
