<?php

namespace App\Modules\Products\Actions;

use App\Modules\Products\Data\ProductData;
use App\Modules\Products\Model\Product;
use App\Modules\Translations\Data\TranslationData;
use Illuminate\Support\Collection;

class StoreProductAction
{
    /**
     * @param  ?Collection<TranslationData>  $translations
     * @param  ?int[]  $ingredients
     * @return Product
     */
    public static function execute(
        ProductData $productData,
        $translations = null,
        $ingredients = null
    ) {

        /** @var Product $product */
        $product = Product::create(array_null_filter($productData->toArray()));

        if ($translations) {
            $product->updateRelation('translations', $translations->toArray());
        }

        $product->ingredients()->sync($ingredients);

        return $product;
    }
}
