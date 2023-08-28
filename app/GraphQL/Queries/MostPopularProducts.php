<?php

namespace App\GraphQL\Queries;

use App\Modules\Products\Model\Product;

final class MostPopularProducts
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Product::all();
    }
}
