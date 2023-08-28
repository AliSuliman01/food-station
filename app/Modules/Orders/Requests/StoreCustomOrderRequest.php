<?php

namespace App\Modules\Orders\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreCustomOrderRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string'],
            'ingredients' => ['array', 'required'],
            'ingredients.*' => ['required', 'exists:ingredients,id,deleted_at,NULL'],
            'notes' => ['nullable', 'string']
        ];
    }
}
