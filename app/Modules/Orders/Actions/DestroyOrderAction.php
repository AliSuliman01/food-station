<?php

namespace App\Modules\Orders\Actions;

use App\Modules\Orders\Model\Order;

class DestroyOrderAction
{
    public static function execute(Order $order)
    {
        $order->delete();

        return $order;
    }
}
