<?php


namespace App\Modules\Products\Controllers;


use App\Helpers\Response;
use App\Helpers\Storage;
use App\Http\Controllers\Controller;
use App\Modules\Ingredients\ViewModels\GetAllIngredientsVM;
use App\Modules\Products\Model\Product;
use App\Modules\Products\Actions\StoreProductAction;
use App\Modules\Products\Actions\DestroyProductAction;
use App\Modules\Products\Actions\UpdateProductAction;
use App\Modules\Products\DTO\ProductDTO;
use App\Modules\Products\Requests\StoreProductRequest;
use App\Modules\Products\Requests\UpdateProductRequest;
use App\Modules\Products\ViewModels\GetProductVM;
use App\Modules\Products\ViewModels\GetAllProductsVM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {

        return view('products.admin.index', [
            'products' => (new GetAllProductsVM())->toArray()
        ]);
    }

    public function show(Product $product)
    {

        return view('products.admin.show', [
            'product' => (new GetProductVM($product))->toArray()
        ]);
    }

    public function edit(Product $product)
    {

        return view('products.admin.edit', [
            'product' => (new GetProductVM($product))->toArray(),
            'ingredients' => (new GetAllIngredientsVM())->toArray()
        ]);
    }

    public function create()
    {
        return view('products.admin.create',[
            'ingredients' => (new GetAllIngredientsVM())->toArray()
        ]);
    }

    public function store(StoreProductRequest $request)
    {

        DB::transaction(function () use ($request) {

            $data = $request->validated();

            $productDTO = ProductDTO::fromRequest($data);

            $productDTO->user_id = Auth::id();

            $product = StoreProductAction::execute($productDTO);

            $product->images()->create([
                'path' => Storage::putFile('products', $data['image'])
            ]);

            $product->translation()->create([
                'name' => $data['name'],
                'description' => $data['description'],
                'language_code' => 'ar',
            ]);

            return $product;
        });
        return redirect()->route('admin.products.index');
    }

    public function update(Product $product, UpdateProductRequest $request)
    {

        DB::transaction(function () use ($product, $request) {

            $data = $request->validated();

            $productDTO = ProductDTO::fromRequest($data);

            $product = UpdateProductAction::execute($product, $productDTO);

            $product->translation()->update([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);

            if (isset($data['image']))
                $product->images()->first()->update(['path' => Storage::putFile('products', $data['image'])]);

        });

        return back();
    }

    public function destroy(Product $product)
    {

        DestroyProductAction::execute($product);
        return redirect()->route('admin.products.index');
    }

}
