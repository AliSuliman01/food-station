<?php

namespace App\Modules\Products\Actions;

use App\Modules\Products\DTO\ProductDTO;
use App\Modules\Products\Model\Product;

class StoreProductAction
{
    /**
     * @return Product
     */
    public static function execute(
        ProductDTO $productDTO
    ) {

        return Product::create(array_null_filter($productDTO->toArray()));
    }
}
