<?php

namespace App\Modules\Categories\Requests;

use App\Http\Requests\ApiFormRequest;

class UpdateCategoryRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'parent_category_id' => ['integer', 'nullable', 'exists:categories,id,deleted_at,NULL'],
            'name' => 'required',
            'translations.*.id' => ['required', 'exists:translations,id,deleted_at,NULL'],
            'translations.*.language_code' => ['required'],
            'translations.*.name' => ['required', 'string'],
            'translations.*.description' => ['nullable', 'string'],
            'translations.*.notes' => ['nullable', 'string'],
            'images' => ['nullable'],
            'images.*.id' => ['required', 'exists:images,id,deleted_at,NULL'],
            'images.*.path' => ['required'],
        ];
    }
}
