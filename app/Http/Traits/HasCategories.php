<?php

namespace App\Http\Traits;

use App\Enums\CategoryEnum;
use App\Modules\Categories\Model\Category;
use App\Modules\Categorizable\Model\Categorizable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasCategories
{
    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function categorizables()
    {
        return $this->morphMany(Categorizable::class, 'categorizable');
    }

    public function scopeCategory(Builder $query, CategoryEnum $categoryEnum): void
    {
        $query->whereRelation('categorizables', 'category_id', '=', $categoryEnum->value);
    }
}
