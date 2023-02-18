<?php

namespace App\Modules\Categories\Actions;

use App\Modules\Categories\Model\Category;
use App\Modules\Categories\DTO\CategoryDTO;

class StoreCategoryAction
{
    public static function execute(
    CategoryDTO $categoryDTO
    ){

        return Category::create(array_null_filter($categoryDTO->toArray()));
    }
}
