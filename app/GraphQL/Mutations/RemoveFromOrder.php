<?php

namespace App\GraphQL\Mutations;

use App\Modules\Carts\Actions\UpdateCartAction;
use App\Modules\Carts\Data\CartData;
use App\Modules\Carts\ViewModels\GetCartVM;

final class RemoveFromOrder
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if (request()->user()->open_order) {

            $cart = (new GetCartVM($args['cart_id']))->toArray();

            return UpdateCartAction::execute(
                $cart,
                new CartData(quantity: $cart->quantity - $args['quantity']));
        }
    }
}
