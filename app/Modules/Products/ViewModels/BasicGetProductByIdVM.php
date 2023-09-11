<?php

namespace App\Modules\Products\ViewModels;

use App\Modules\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;

class BasicGetProductByIdVM implements Arrayable
{
    private $product;

    public function __construct($productId)
    {
        $this->product = Product::find($productId);
    }

    public function toArray()
    {
        return $this->product;
    }
}
