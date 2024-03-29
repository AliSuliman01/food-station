<?php

namespace App\Modules\Categories\Actions;

use App\Modules\Categories\DTO\CategoryDTO;
use App\Modules\Categories\Model\Category;

class UpdateCategoryAction
{
    public static function execute(
        Category $category, CategoryDTO $categoryDTO
    ) {
        $category->update(array_null_filter($categoryDTO->toArray()));

        return $category;
    }
}
