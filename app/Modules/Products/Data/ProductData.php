<?php

namespace App\Modules\Products\Data;

use App\Enums\ProductStatusEnum;
use App\Enums\ProductTypeEnum;
use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?float $price = null,
        public ?int $rate = null,
        public ?int $restaurant_id = null,
        public ?int $customer_user_id = null,
        public ?string $preparing_time = null,
        public ?ProductStatusEnum $status = null,
        public ?ProductTypeEnum $type = null,
    ) {
    }
}
