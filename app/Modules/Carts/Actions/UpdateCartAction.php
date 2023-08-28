<?php

namespace App\Modules\Carts\Actions;

use App\Modules\Carts\Data\CartData;

class UpdateCartAction
{
    public static function execute($cart, CartData $cartData)
    {
        if ($cartData->quantity <= 0) {
            $cart->delete();
        } else {

            $cart->quantity = $cartData->quantity;
            $cart->notes = $cartData->notes;

            $cart->save();

        }

        return $cart;
    }
}
