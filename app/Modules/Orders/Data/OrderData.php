<?php

namespace App\Modules\Orders\Data;

use App\Enums\OrderStatusEnum;
use Spatie\LaravelData\Data;

class OrderData extends Data
{
    public function __construct(
        public ?int $user_id = null,
        public ?int $prepared_by_user_id = null,
        public ?OrderStatusEnum $status = null
    ) {
    }
}
