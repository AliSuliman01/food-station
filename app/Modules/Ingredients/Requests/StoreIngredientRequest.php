<?php

namespace App\Modules\Ingredients\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreIngredientRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
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
