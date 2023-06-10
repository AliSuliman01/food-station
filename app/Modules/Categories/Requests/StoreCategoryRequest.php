<?php

namespace App\Modules\Categories\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreCategoryRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'parent_category_id' => ['integer', 'nullable', 'exists:categories,id,deleted_at,NULL'],
            'name' => 'string|required',
            'translations.*.language_code' => ['required'],
            'translations.*.name' => ['required', 'string'],
            'translations.*.description' => ['nullable', 'string'],
            'translations.*.notes' => ['nullable', 'string'],
            'images' => ['required'],
            'images.*.path' => ['required'],
        ];
    }
}
