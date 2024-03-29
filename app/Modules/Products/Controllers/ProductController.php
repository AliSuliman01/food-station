<?php

namespace App\Modules\Products\Controllers;

use App\Enums\CategoryEnum;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Products\Actions\DestroyProductAction;
use App\Modules\Products\Actions\StoreProductAction;
use App\Modules\Products\Actions\UpdateProductAction;
use App\Modules\Products\Data\ProductData;
use App\Modules\Products\Model\Product;
use App\Modules\Products\Requests\StoreProductRequest;
use App\Modules\Products\Requests\UpdateProductRequest;
use App\Modules\Products\Resources\ProductListResource;
use App\Modules\Products\Resources\ProductShowResource;
use App\Modules\Products\ViewModels\GetAllProductsVM;
use App\Modules\Products\ViewModels\GetProductsByCategoryVM;
use App\Modules\Products\ViewModels\LoadProductVM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return \response()->json(Response::success(
            ProductListResource::collection(
                (new GetAllProductsVM())->toArray()
            )
        ));
    }

    public function available()
    {
        return \response()->json(Response::success(
            ProductListResource::collection(
                (new GetProductsByCategoryVM(CategoryEnum::AVAILABLE_TODAY))->toArray()
            )
        ));
    }

    public function popular()
    {
        return \response()->json(Response::success(
            ProductListResource::collection(
                (new GetProductsByCategoryVM(CategoryEnum::POPULAR_PRODUCTS))->toArray()
            )
        ));
    }

    public function show(Product $product)
    {

        return response()->json(Response::success(
            ProductShowResource::make(
                (new LoadProductVM($product))->toArray()
            )
        ));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $product = DB::transaction(function () use ($request) {

            $data = $request->validated();

            $productDTO = ProductData::from($data);

            $productDTO->user_id = Auth::id();

            $product = StoreProductAction::execute($productDTO);

            $product->updateRelation('images', $data['images']);
            $product->updateRelation('translations', $data['translations']);
            $product->categories()->sync($data['categories']);

            return $product;
        });

        return response()->json(Response::success(
            ProductListResource::make(
                (new LoadProductVM($product))->toArray()
            )
        ));
    }

    public function update(Product $product, UpdateProductRequest $request)
    {
        $product = DB::transaction(function () use ($product, $request) {

            $data = $request->validated();

            $productDTO = ProductData::from($data);

            $product = UpdateProductAction::execute($product, $productDTO);

            $product->updateRelation('images', $data['images']);
            $product->updateRelation('translations', $data['translations']);
            $product->categories()->sync($data['categories']);

            return $product;

        });

        return response()->json(Response::success(
            ProductListResource::make(
                (new LoadProductVM($product))->toArray()
            )
        ));

    }

    public function destroy(Product $product)
    {

        return response()->json(Response::success(
            ProductListResource::make(
                DestroyProductAction::execute($product)
            )
        ));
    }
}
