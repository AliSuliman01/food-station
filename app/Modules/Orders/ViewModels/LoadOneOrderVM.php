<?php

namespace App\Modules\Orders\ViewModels;

use App\Modules\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;

class LoadOneOrderVM implements Arrayable
{
    public function __construct(public Order $order)
    {
    }

    public function toArray()
    {
        return $this->order->load(['carts.product', 'user', 'prepared_by_user']);
    }
}
