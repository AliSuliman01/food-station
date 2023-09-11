<?php

namespace App\Modules\Orders\ViewModels;

use App\Modules\Orders\Model\Order;
use App\Modules\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;

class GetUserOrdersVM implements Arrayable
{
    public function __construct(public User $user)
    {
    }

    public function toArray()
    {
        return Order::with(['carts'])->where('user_id', '=', $this->user->id)->get();
    }
}
