<?php

namespace App\Modules\Orders\Model;

use App\Models\OptimizedModel;
use App\Modules\OrderStatuses\Model\OrderStatus;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends OptimizedModel
{
    use SoftDeletes;

    public function order_status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function getStatus()
    {
        return $this->order_status?->name;
    }
}
