<?php

namespace App\Modules\Categories\ViewModels;

use App\Modules\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;

class GetTreeCategoriesVM implements Arrayable
{
    private $root;

    public function __construct($root = null)
    {
        $this->root = $root;
    }

    public function toArray()
    {
        return Category::with(['translation', 'image', 'ingredients'])
            ->when(isset(request()->filter), function ($query) {
                $query->whereRelation('translation', 'name', 'like', '%'.request()->filter.'%');
            }, function ($query) {
                $query->where('parent_category_id', $this->root);
            })
            ->get();
    }
}
