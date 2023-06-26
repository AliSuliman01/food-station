<?php

namespace App\Http\Traits;

use App\Modules\Categories\Model\Category;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasCategories
{
    public function categories():MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
