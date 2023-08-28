<?php

namespace App\Modules\Carts\ViewModels;

use App\Modules\Carts\Model\Cart;
use Illuminate\Contracts\Support\Arrayable;

class GetCartVM implements Arrayable
{
    public $cart;

    public function __construct($cartId)
    {
        $this->cart = Cart::find($cartId);
    }

    public function toArray()
    {
        return $this->cart;
    }
}
