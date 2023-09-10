<?php

namespace App\Modules\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // TODO: calculate rate_count
        return [
            'id' => $this->id,
            'old_price' => $this->old_price,
            'price' => $this->price,
            'rate' => $this->rate,
            'my_rate' => $this->rate,
            'rate_count' => 507,
            'preparing_time' => $this->preparing_time,
            'extra_items' => $this->extra_items,
            'name' => $this->translation?->name ?? $this->name,
            'notes' => $this->translation?->notes ?? $this->notes,
            'main_image' => $this->main_image->original_url,
            'restaurant' => $this->restaurant?->only(['name', 'is_verified']),
        ];
    }
}
