<?php

namespace App\Modules\Products\ViewModels;

use App\Modules\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;

class GetAllProductsVM implements Arrayable
{
    public function toArray()
    {
        return Product::with([
            'images',
            'translations',
            'categories',
        ])
            ->when(request()->filter, function ($query) {
                $query->whereRelation('translation', 'name', 'like', '%'.request()->filter.'%');
            })
            ->latest()
            ->get();
    }
}
