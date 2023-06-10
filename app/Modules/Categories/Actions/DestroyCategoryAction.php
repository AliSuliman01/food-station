<?php

namespace App\Modules\Categories\Actions;

use App\Modules\Categories\Model\Category;

class DestroyCategoryAction
{
    public static function execute(
        Category $category
    ) {
        $category->delete();

        return $category;
    }
}
