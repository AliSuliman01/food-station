<?php

namespace App\Modules\Carts\Data;

use Spatie\LaravelData\Data;

class CartData extends Data
{
    public function __construct(
        public int|null $order_id = null,
        public int|null $product_id = null,
        public int|null $quantity = null,
        public array|null $notes = null
    ) {
    }
}
