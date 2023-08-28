<?php

namespace App\Modules\Orders\Actions;

use App\Modules\Orders\Data\OrderData;
use App\Modules\Orders\Model\Order;

class StoreOrderAction
{
    public static function execute(OrderData $orderData)
    {
        $order = new Order();

        $order->fill($orderData->toArray());

        $order->save();

        return $order;
    }
}
