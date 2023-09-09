<?php

namespace App\Modules\Products\ViewModels;

use App\Modules\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class GetProductsByCategoryVM implements Arrayable
{
    private $categoryName;

    public function __construct($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    public function toArray()
    {
        return QueryBuilder::for(Product::class)
            ->allowedFilters([
                AllowedFilter::callback('name', function (Builder $query, $value) {
                    $query->where('name', 'like', "%{$value}%")
                        ->orWhereRelation('translation', 'name', 'like', "%{$value}%");
                }),])
            ->with([
                'translation:name',
                'main_image:original_url'
            ])
            ->whereRelation('categories', 'name', '=', $this->categoryName)
            ->latest()
            ->get();
    }
}
