<?php

namespace App\Modules\Products\Actions;

use App\Modules\Products\Data\ProductData;
use App\Modules\Products\Model\Product;

class UpdateProductAction
{
    public static function execute(
        Product $product, ProductData $productData
    ) {
        $product->update(array_null_filter($productData->toArray()));

        return $product;
    }
}
