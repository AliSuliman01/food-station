<?php

namespace App\Modules\Products\Resources;

use App\Modules\Ingredients\Resources\IngredientResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductBaseResource extends JsonResource
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
            'old_price' => $this->old_price,
            'price' => $this->price,
            'rate' => $this->rate,
            'my_rate' => $this->rate,
            'rate_count' => 507,
            'preparing_time' => $this->preparing_time,
            'extra_items' => $this->extra_items,
            'name' => $this->translation?->name ?? $this->name,
            'notes' => $this->translation?->notes ?? $this->notes,
            'main_image' => $this->main_image?->original_url
        ];
    }
}
