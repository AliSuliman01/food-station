<?php

namespace App\Modules\Categories\Actions;

use App\Modules\Categories\DTO\CategoryDTO;
use App\Modules\Categories\Model\Category;

class StoreCategoryAction
{
    public static function execute(
        CategoryDTO $categoryDTO
    ) {

        return Category::create(array_null_filter($categoryDTO->toArray()));
    }
}
