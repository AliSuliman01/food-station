<?php

namespace App\Modules\Products\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreProductRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'price' => 'nullable',
            'restaurant_id' => ['required', 'exists:restaurants,id,deleted_at,NULL'],
            'translations' => 'array',
            'translations.*.language_code' => ['required'],
            'translations.*.name' => ['required', 'string'],
            'translations.*.description' => ['nullable', 'string'],
            'translations.*.notes' => ['nullable', 'string'],
            'images' => ['required'],
            'images.*.path' => ['required'],
            'categories' => ['required'],
            'categories.*' => ['required', 'exists:categories,id,deleted_at,NULL'],
        ];
    }
}
