<?php

namespace App\Modules\Categories\Controllers;

use App\Enums\CategoryEnum;
use App\Enums\MediaCollectionEnum;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Categories\Actions\DestroyCategoryAction;
use App\Modules\Categories\Actions\StoreCategoryAction;
use App\Modules\Categories\Actions\UpdateCategoryAction;
use App\Modules\Categories\DTO\CategoryDTO;
use App\Modules\Categories\Model\Category;
use App\Modules\Categories\Requests\StoreCategoryRequest;
use App\Modules\Categories\Requests\UpdateCategoryRequest;
use App\Modules\Categories\ViewModels\GetCategoriesByParentVM;
use App\Modules\Categories\ViewModels\GetCategoryVM;
use App\Modules\Categories\ViewModels\GetAllCategoriesVM;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {

        return response()->json(Response::success((new GetAllCategoriesVM())->toArray()));
    }

    public function show(Category $category)
    {

        return response()->json(Response::success((new GetCategoryVM($category))->toArray()));
    }

    public function store(StoreCategoryRequest $request)
    {

        $data = $request->validated();

        $categoryDTO = CategoryDTO::fromRequest($data);

        $category = StoreCategoryAction::execute($categoryDTO);

        $category->updateRelation('translations', $data['translations']);

        if (isset($data['image']))
            $category->addMedia(Storage::path($data['image']))
                ->toMediaCollection(MediaCollectionEnum::IMAGE);

        $category->parent_categories()->sync($data['parent_categories'] ?? []);

        return response()->json(Response::success((new GetCategoryVM($category))->toArray()));
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $data = $request->validated();

        $categoryDTO = CategoryDTO::fromRequest($data);

        $category = UpdateCategoryAction::execute($category, $categoryDTO);

        $category->updateRelation('translations', $data['translations']);

        if (isset($data['image']))
            $category->addMedia(Storage::path($data['image']))
                ->toMediaCollection(MediaCollectionEnum::IMAGE);

        $category->parent_categories()->sync($data['parent_categories'] ?? []);

        return response()->json(Response::success((new GetCategoryVM($category))->toArray()));
    }

    public function destroy(Category $category)
    {
        return response()->json(Response::success(DestroyCategoryAction::execute($category)));
    }

    public function ingredients()
    {
        return \response()->json(Response::success(
            (new GetCategoriesByParentVM(CategoryEnum::INGREDIENTS()))->toArray()
        ));
    }
}
