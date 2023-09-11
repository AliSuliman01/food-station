<?php

namespace App\Modules\Orders\Resources;

use App\Modules\Carts\Resources\CartResource;
use App\Modules\Users\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'carts' => CartResource::collection($this->carts),
            'user' => UserResource::make($this->user),
            'prepared_by_user' => UserResource::make($this->prepared_by_user),
        ];
    }
}
