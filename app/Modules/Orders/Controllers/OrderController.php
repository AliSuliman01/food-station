<?php


namespace App\Modules\Orders\Controllers;


use App\Enums\OrderStatusEnum;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Carts\Actions\StoreCartAction;
use App\Modules\Carts\Data\CartData;
use App\Modules\Orders\Actions\DestroyOrderAction;
use App\Modules\Orders\Actions\StoreOrderAction;
use App\Modules\Orders\Data\OrderData;
use App\Modules\Orders\Model\Order;
use App\Modules\Orders\Requests\StoreCustomOrderRequest;
use App\Modules\Orders\Requests\StoreOrderRequest;
use App\Modules\Orders\ViewModels\GetAllOrdersVM;
use App\Modules\Orders\ViewModels\LoadOneOrderVM;
use App\Modules\Products\Actions\StoreProductAction;
use App\Modules\Products\Data\ProductData;
use App\Modules\Translations\Data\TranslationData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        return response()->json(Response::success((new GetAllOrdersVM())->toArray()));
    }

    public function show(Order $order)
    {
        return response()->json(Response::success((new LoadOneOrderVM($order))->toArray()));
    }

    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();

        $order = DB::transaction(function () use($data){

            $orderData = new OrderData(
                $data['user_id'],
                $data['prepared_by_user_id'] ?? null,
                OrderStatusEnum::OPEN()
            );

            $order = StoreOrderAction::execute($orderData);

            $carts = [];
            foreach ($data['carts'] as $cart) {
                $cartData = new CartData(
                    $order->id,
                    $data['product_id'],
                    $data['quantity'],
                    $data['notes'],
                );
                $carts[] = array_merge($cartData->toArray(), [
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString(),
                ]);
            }
            $order->carts()->insert($carts);
            return $order;
        });

        return response()->json(Response::success((new LoadOneOrderVM($order))->toArray()));
    }

    public function store_custom(StoreCustomOrderRequest $request)
    {
        $this->authorize('store_custom', Order::class);

        $data = $request->validated();

        $order = DB::transaction(function ()use ($data){

            $productData = new ProductData(
                customer_user_id: Auth::id()
            );

            $translationData = new TranslationData(
                name: $data['name'],
                notes: $data['notes'],
            );

            $product = StoreProductAction::execute($productData, [$translationData], $data['ingredients']);

            $orderData = new OrderData(
                user_id: Auth::id(),
                status: OrderStatusEnum::OPEN()
            );
            $order = StoreOrderAction::execute($orderData);

            $cartData = new CartData(
                order_id: $order->id,
                product_id: $product->id,
                quantity: 1,
            );

            StoreCartAction::execute($cartData);

            return $order;
        });
        return response()->json(Response::success((new LoadOneOrderVM($order))->toArray()));
    }
    public function destroy(Order $order)
    {
        return response()->json(Response::success(DestroyOrderAction::execute($order)));
    }
}
