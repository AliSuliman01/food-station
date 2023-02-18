<?php


namespace App\Modules\Products\ViewModels;

use App\Modules\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;

class GetProductVM implements Arrayable
{

    private $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function toArray()
    {
        return  $this->product;
    }
}
