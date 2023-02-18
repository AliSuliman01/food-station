<?php

namespace App\Modules\Products\Actions;

use App\Modules\Products\Model\Product;
use App\Modules\Products\DTO\ProductDTO;

class UpdateProductAction
{
    public static function execute(
        Product $product,ProductDTO $productDTO
    ){
        $product->update(array_null_filter($productDTO->toArray()));
        return $product;
    }
}
