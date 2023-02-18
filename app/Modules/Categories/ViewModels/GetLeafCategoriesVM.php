<?php


namespace App\Modules\Categories\ViewModels;

use App\Modules\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;

class GetLeafCategoriesVM implements Arrayable
{
    public function toArray()
    {
        return Category::with(['translation', 'image', 'ingredients'])
            ->whereDoesntHave('sub_categories')
            ->get();
    }
}
