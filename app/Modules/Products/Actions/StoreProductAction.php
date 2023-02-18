<?php

namespace App\Modules\Products\Actions;

use App\Modules\Products\Model\Product;
use App\Modules\Products\DTO\ProductDTO;

class StoreProductAction
{
    /**
     * @param ProductDTO $productDTO
     * @return Product
     */
    public static function execute(
    ProductDTO $productDTO
    ){

        return Product::create(array_null_filter($productDTO->toArray()));
    }
}
