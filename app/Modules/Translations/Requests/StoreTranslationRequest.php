<?php

namespace App\Modules\Translations\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreTranslationRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'integer|required',
            'translatable_id' => 'required',
            'translatable_type' => 'nullable',
            'name' => 'nullable',
            'description' => 'nullable',
            'notes' => 'nullable',

        ];
    }
}
