<?php

namespace App\Modules\Categories\ViewModels;

use Illuminate\Contracts\Support\Arrayable;

class GetCategoryVM implements Arrayable
{
    private $category;

    public function __construct($category)
    {
        $this->category = $category->load(['translations', 'image', 'ingredients.translation', 'parent_categories.translation']);
    }

    public function toArray()
    {
        return $this->category;
    }
}
