<?php

namespace App\Modules\Categories\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreCategoryRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|required',

            'translations.*.language_code' => ['required'],
            'translations.*.name' => ['required', 'string'],
            'translations.*.description' => ['nullable', 'string'],
            'translations.*.notes' => ['nullable', 'string'],

            'image' => ['nullable'],

            'parent_categories' => ['required'],
            'parent_categories.*' => ['required', 'exists:categories,id,deleted_at,NULL'],
        ];
    }
}
