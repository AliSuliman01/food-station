<?php

namespace App\Modules\Users\ViewModels;

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
        return $this->user->orders()->simplePaginate();
    }
}
