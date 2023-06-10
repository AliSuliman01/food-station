<?php

namespace App\Modules\Images\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreImageRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'integer|required',
            'imagable_id' => 'required',
            'imagable_type' => 'nullable',
            'path' => 'nullable',

        ];
    }
}
