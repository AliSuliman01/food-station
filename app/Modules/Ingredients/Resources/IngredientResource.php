<?php

namespace App\Modules\Ingredients\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IngredientResource extends JsonResource
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
            'name' => $this->translation?->name,
            'notes' => $this->translation?->notes,
            'main_image' => $this->main_image->original_url,
        ];
    }
}
