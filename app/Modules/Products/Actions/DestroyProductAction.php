<?php

namespace App\Modules\Products\Actions;

use App\Modules\Products\Model\Product;

class DestroyProductAction
{
    public static function execute(
        Product $product
    ) {
        $product->delete();

        return $product;
    }
}
