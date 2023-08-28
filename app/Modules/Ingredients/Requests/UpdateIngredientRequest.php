<?php

namespace App\Modules\Ingredients\Requests;

use App\Http\Requests\ApiFormRequest;

class UpdateIngredientRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'translations' => 'array',
            'translations.*.language_code' => ['required'],
            'translations.*.name' => ['required', 'string'],
            'translations.*.description' => ['nullable', 'string'],
            'translations.*.notes' => ['nullable', 'string'],
            'image' => ['sometimes'],
            'categories' => ['required'],
            'categories.*' => ['required', 'exists:categories,id,deleted_at,NULL'],
        ];
    }
}
