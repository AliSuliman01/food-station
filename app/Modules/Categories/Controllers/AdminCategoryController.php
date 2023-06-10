<?php

namespace App\Modules\Categories\Controllers;

use App\Helpers\Storage;
use App\Http\Controllers\Controller;
use App\Modules\Categories\Actions\DestroyCategoryAction;
use App\Modules\Categories\Actions\StoreCategoryAction;
use App\Modules\Categories\Actions\UpdateCategoryAction;
use App\Modules\Categories\DTO\CategoryDTO;
use App\Modules\Categories\Model\Category;
use App\Modules\Categories\Requests\StoreCategoryRequest;
use App\Modules\Categories\Requests\UpdateCategoryRequest;
use App\Modules\Categories\ViewModels\GetCategoryVM;
use App\Modules\Categories\ViewModels\GetTreeCategoriesVM;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index($root = null)
    {

        return view('categories.admin.index', [
            'categories' => (new GetTreeCategoriesVM($root))->toArray(),
        ]);
    }

    public function show(Category $category)
    {

        return view('categories.admin.show', [
            'category' => (new GetCategoryVM($category))->toArray(),
        ]);
    }

    public function dive_or_edit(Category $category)
    {
        if ($category->sub_categories->count()) {
            return redirect()->route('admin.categories.index_from_root', ['root' => $category->id]);
        }

        return redirect()->route('admin.categories.edit', ['category' => $category->id]);
    }

    public function edit(Category $category)
    {
        return view('categories.admin.edit', [
            'category' => (new GetCategoryVM($category))->toArray(),
            'categories' => (new GetTreeCategoriesVM())->toArray(),
        ]);
    }

    public function create()
    {
        return view('categories.admin.create', [
            'categories' => (new GetTreeCategoriesVM())->toArray(),
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {

        $data = $request->validated();

        $categoryDTO = CategoryDTO::fromRequest($data);

        $category = StoreCategoryAction::execute($categoryDTO);

        if (isset($data['image'])) {
            $category->images()->create([
                'path' => Storage::putFile('categories', $data['image']),
            ]);
        }

        $category->translation()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'language_code' => 'ar',
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {

        $data = $request->validated();

        $categoryDTO = CategoryDTO::fromRequest($data);

        $category = UpdateCategoryAction::execute($category, $categoryDTO);

        $category->translation()->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        if (isset($data['image'])) {
            $category->images()->first()->update(['path' => Storage::putFile('categories', $data['image'])]);
        }

        return back();
    }

    public function destroy(Category $category)
    {

        DestroyCategoryAction::execute($category);

        return redirect()->route('admin.categories.index');

    }
}
