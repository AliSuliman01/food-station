<?php

namespace App\Modules\Products\ViewModels;

use Illuminate\Contracts\Support\Arrayable;

class GetProductVM implements Arrayable
{
    private $product;

    public function __construct($product)
    {
        $this->product = $product->load([
            'images',
            'translations',
            'categories',
        ]);
    }

    public function toArray()
    {
        return $this->product;
    }
}
