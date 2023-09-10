<?php

namespace App\GraphQL\Mutations;

use App\Modules\Carts\Actions\StoreCartAction;
use App\Modules\Carts\Actions\UpdateCartAction;
use App\Modules\Carts\Data\CartData;
use App\Modules\Orders\Actions\StoreOrderAction;
use App\Modules\Orders\Data\OrderData;
use Illuminate\Support\Facades\DB;

final class AddToOrder
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return DB::transaction(function () use ($args) {

            if (! $order = request()->user()->open_order) {
                $order = StoreOrderAction::execute(new OrderData(request()->user()->id));
            }

            $cartData = CartData::from(array_merge($args, [
                'order_id' => $order->id,
            ]));

            $matchedCart = $order->carts
                ->where('product_id', $cartData->product_id)
                ->where('notes', $cartData->notes)
                ->first();

            if ($matchedCart) {
                $cart = UpdateCartAction::execute(
                    $matchedCart,
                    new CartData(
                        quantity: $matchedCart->quantity + $cartData->quantity
                    ));
            } else {
                $cart = StoreCartAction::execute($cartData);
            }

            return $cart;
        });
    }
}
