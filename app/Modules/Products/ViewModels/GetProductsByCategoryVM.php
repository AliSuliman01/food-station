<?php


namespace App\Modules\Products\ViewModels;

use App\Modules\Categories\Model\Category;
use App\Modules\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class GetProductsByCategoryVM implements Arrayable
{
    private $categoryName;

    public function __construct($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    public function toArray()
    {
        return Product::with(['translation', 'images'])
            ->whereRelation('categories','name', '=', $this->categoryName)
            ->when(request()->filter, function($query){
                $query->whereRelation('translation','name','like','%' . request()->filter . '%');
            })
            ->latest()
            ->get();
    }
}
