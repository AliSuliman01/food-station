<?php


namespace App\Modules\Categories\Observers;


use App\Modules\Categories\Model\Category;
use Illuminate\Support\Str;

class CategoryObserver
{

    public function created(Category $category)
    {
        $category->slug = Str::slug($category->name . ' '.$category->id);
        $category->save();
    }
}
