<?php

namespace App\Modules\Categories\ViewModels;

use App\Modules\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;

class GetLeafCategoriesVM implements Arrayable
{
    private $with;

    public function __construct($with = [])
    {
        $this->with = $with;
    }

    public function toArray()
    {
        return Category::with($this->with + ['translation', 'image', 'ingredients'])
            ->whereDoesntHave('sub_categories')
            ->get();
    }
}
