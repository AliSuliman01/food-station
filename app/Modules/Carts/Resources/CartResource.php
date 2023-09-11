<?php

namespace App\Modules\Carts\Resources;

use App\Modules\Products\Resources\ProductListResource;
use App\Modules\Products\Resources\ProductShowResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'quantity' => $this->quantity,
            'price' => $this->price,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'product' => ProductShowResource::make($this->product)
        ];
    }
}
