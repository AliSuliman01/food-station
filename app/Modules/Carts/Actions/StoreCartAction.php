<?php

namespace App\Modules\Carts\Actions;

use App\Modules\Carts\Data\CartData;
use App\Modules\Carts\Model\Cart;
use App\Modules\Products\ViewModels\GetProductVM;

class StoreCartAction
{
    public static function execute(CartData $cartData)
    {
        $cart = new Cart();
        $product = (new GetProductVM($cartData->product_id))->toArray();

        $cart->order_id = $cartData->order_id;
        $cart->product_id = $cartData->product_id;
        $cart->price = $product->price;
        $cart->quantity = $cartData->quantity;
        $cart->notes = $cartData->notes;

        $cart->save();

        return $cart;
    }
}
