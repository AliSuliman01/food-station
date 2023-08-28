<?php

namespace App\Modules\Products\Actions;

use App\Modules\Products\Data\ProductData;
use App\Modules\Products\DTO\ProductDTO;
use App\Modules\Products\Model\Product;
use App\Modules\Translations\Data\TranslationData;

class StoreProductAction
{
    /**
     * @param ProductData $productData
     * @param ?TranslationData[] $translations
     * @param ?int[] $ingredients
     *
     * @return Product
     */
    public static function execute(
        ProductData $productData,
        $translations = null,
        $ingredients = null
    ) {

        /** @var Product $product */
        $product = Product::create(array_null_filter($productData->toArray()));

        if ($translations){
            $product->updateRelation('translations', $translations);
        }

        $product->ingredients()->sync($ingredients);

        return $product;
    }
}
