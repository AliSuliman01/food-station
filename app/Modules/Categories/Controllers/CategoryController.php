<?php

namespace App\Modules\Categories\Controllers;

use App\Helpers\Response;
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

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {

        return response()->json(Response::success((new GetTreeCategoriesVM())->toArray()));
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

        $ingredient->updateRelation('translations', $data['translations']);
        $ingredient->updateRelation('images', $data['translations']);

        return response()->json(Response::success((new GetCategoryVM($category))->toArray()));
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {

        $data = $request->validated();

        $categoryDTO = CategoryDTO::fromRequest($data);

        $category = UpdateCategoryAction::execute($category, $categoryDTO);

        $ingredient->updateRelation('translations', $data['translations']);
        $ingredient->updateRelation('images', $data['translations']);

        return response()->json(Response::success((new GetCategoryVM($category))->toArray()));
    }

    public function destroy(Category $category)
    {

        return response()->json(Response::success(DestroyCategoryAction::execute($category)));
    }
}
