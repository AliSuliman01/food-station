<?php

namespace App\Modules\Products\Resources;

use Illuminate\Http\Request;

class ProductListResource extends ProductBaseResource
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
            'ingredients' => $this->ingredients->map(fn($ingredient) => $ingredient->translation->name)
        ]);
    }
}
