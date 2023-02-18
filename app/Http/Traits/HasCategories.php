<?php

namespace App\Http\Traits;

use App\Modules\Categories\Model\Category;

trait HasCategories
{
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
