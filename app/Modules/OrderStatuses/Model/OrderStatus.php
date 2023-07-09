<?php

namespace App\Modules\OrderStatuses\Model;

use App\Models\OptimizedModel;

class OrderStatus extends OptimizedModel
{
    const ACTIVE = 'active';
    const EXPIRED = 'expired';
    const ISSUED = 'issued';
    const PAID = 'paid';
}
