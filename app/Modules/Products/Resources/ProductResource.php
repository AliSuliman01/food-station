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
        return [
            'id' => $this->id,
            'price' => $this->price,
            'rate' => $this->rate,
            'preparing_time' => $this->preparing_time,
            'name' => $this->translation?->name ?? $this->name,
            'notes' => $this->translation?->notes ?? $this->notes,
            'main_image' => $this->main_image->original_url,
        ];
    }
}
