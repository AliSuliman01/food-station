<?php


namespace App\Modules\Products\Controllers;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Categories\Model\Category;
use App\Modules\Products\Model\Product;
use App\Modules\Products\Actions\StoreProductAction;
use App\Modules\Products\Actions\DestroyProductAction;
use App\Modules\Products\Actions\UpdateProductAction;
use App\Modules\Products\DTO\ProductDTO;
use App\Modules\Products\Requests\StoreProductRequest;
use App\Modules\Products\Requests\UpdateProductRequest;
use App\Modules\Products\ViewModels\GetProductsByCategoryVM;
use App\Modules\Products\ViewModels\GetProductVM;
use App\Modules\Products\ViewModels\GetAllProductsVM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return \response()->json(Response::success((new GetAllProductsVM())->toArray()));
    }

    public function available()
    {
        return \response()->json(Response::success((new GetProductsByCategoryVM(Category::AVAILABLE))->toArray()));
    }

    public function most_bought()
    {
        return \response()->json(Response::success((new GetProductsByCategoryVM(Category::MOST_BOUGHT))->toArray()));
    }

    public function show(Product $product)
    {

        return response()->json(Response::success((new GetProductVM($product))->toArray()));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {

        $product = DB::transaction(function () use ($request) {

            $data = $request->validated();

            $productDTO = ProductDTO::fromRequest($data);

            $productDTO->user_id = Auth::id();

            $product = StoreProductAction::execute($productDTO);

            $image_path = Storage::disk('public')->putFile('products', $data['image']);

            $product->images()->create([
                'path' => "/storage/$image_path"
            ]);

            $product->translation()->create([
                'name' => $data['name'],
                'description' => $data['description'],
                'language_code' => 'ar',
            ]);

            return $product;
        });

        return response()->json(Response::success($product));
    }

    public function update(Product $product, UpdateProductRequest $request)
    {

        $data = $request->validated();

        $productDTO = ProductDTO::fromRequest($data);

        $product = UpdateProductAction::execute($product, $productDTO);

        return response()->json(Response::success($product));

    }

    public function destroy(Product $product)
    {

        DestroyProductAction::execute($product);
        return redirect()->route('admin.products.index');

    }

}
