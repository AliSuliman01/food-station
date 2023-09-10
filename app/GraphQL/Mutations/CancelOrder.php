<?php

namespace App\GraphQL\Mutations;

use App\Enums\OrderStatusEnum;
use App\Modules\Orders\Actions\ChangeOrderStatus;

final class CancelOrder
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if (! request()->user()->open_order) {
            return ChangeOrderStatus::execute(request()->user()->open_order, OrderStatusEnum::CANCELED());
        }
    }
}
