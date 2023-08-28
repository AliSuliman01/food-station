<?php

namespace App\Modules\Products\ViewModels;

use App\Modules\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;

class GetProductVM implements Arrayable
{
    private $product;

    public function __construct($productId)
    {
        $this->product = Product::with([
            'images',
            'translations',
            'categories',
        ])->find($productId);
    }

    public function toArray()
    {
        return $this->product;
    }
}
