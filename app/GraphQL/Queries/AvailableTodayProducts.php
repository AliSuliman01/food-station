<?php

namespace App\GraphQL\Queries;

use App\Enums\CategoryEnum;
use App\Modules\Products\Model\Product;

final class AvailableTodayProducts
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Product::category(CategoryEnum::AVAILABLE_TODAY())->get();
    }
}
