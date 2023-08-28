<?php

namespace App\Modules\Categories\ViewModels;

use App\Modules\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;

class GetAllCategoriesVM implements Arrayable
{
    public function __construct()
    {
    }

    public function toArray()
    {
        return Category::with(['translation', 'image', 'sub_categories.translation'])
            ->when(isset(request()->filter), function ($query) {
                $query->whereRelation('translation', 'name', 'like', '%'.request()->filter.'%');
            })
            ->get();
    }
}
