<?php

namespace App\Modules\Orders\Actions;

use App\Enums\OrderStatusEnum;
use App\Modules\Orders\Model\Order;

class ChangeOrderStatus
{
    public static function execute(Order $order, OrderStatusEnum $orderStatus)
    {
        $order->status = $orderStatus->value;

        $order->save();

        return $order;
    }
}
