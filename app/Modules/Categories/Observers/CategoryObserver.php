<?php

namespace App\Modules\Categories\Observers;

use App\Modules\Categories\Model\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    public function creating(Category $category)
    {
        $category->slug = Str::slug($category->name . '-' . time());
    }

    public function updating(Category $category)
    {
        $category->slug = Str::slug($category->name . '-' . time());
    }
}
