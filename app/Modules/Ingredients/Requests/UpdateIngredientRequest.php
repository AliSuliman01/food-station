<?php

namespace App\Modules\Ingredients\Requests;

use App\Http\Requests\ApiFormRequest;

class UpdateIngredientRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'translations' => 'array',
            'translations.*.id' => ['required', 'exists:translations,id,deleted_at,NULL'],
            'translations.*.language_code' => ['required'],
            'translations.*.name' => ['required', 'string'],
            'translations.*.description' => ['nullable', 'string'],
            'translations.*.notes' => ['nullable', 'string'],
            'images' => ['required'],
            'images.*.id' => ['required', 'exists:images,id,deleted_at,NULL'],
            'images.*.path' => ['required'],
            'categories' => ['required'],
            'categories.*' => ['required', 'exists:categories,id,deleted_at,NULL'],
        ];
    }
}
