<?php

namespace App\Modules\Categories\ViewModels;

use App\Exceptions\CategoryExistenceException;
use App\Modules\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Collection;

class GetCategoriesByParentVM implements Arrayable
{
    public function __construct(public $parentCategoryName)
    {
    }

    /**
     * @return Collection
     *
     * @throws CategoryExistenceException
     */
    public function toArray()
    {
        $category = Category::getByName($this->parentCategoryName);

        return $category->sub_categories()->with([
            'translation',
            'main_image',
            'ingredients.translation',
            'ingredients.main_image',
        ])->get();
    }
}
