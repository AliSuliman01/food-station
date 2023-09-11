<?php

namespace App\Modules\Products\Resources;

use App\Modules\Ingredients\Resources\IngredientResource;
use Illuminate\Http\Request;

class ProductShowResource extends ProductBaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_merge(parent::toArray($request), [
            'restaurant' => $this->restaurant?->only(['name', 'is_verified']),
            'ingredients' => IngredientResource::collection($this->ingredients)
        ]);
    }
}
