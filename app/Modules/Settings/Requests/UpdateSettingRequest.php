<?php

namespace App\Modules\Settings\Requests;

use App\Http\Requests\ApiFormRequest;

class UpdateSettingRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'integer|required',
            'group' => 'string|required',
            'name' => 'string|required',
            'locked' => 'integer|required',
            'payload' => 'integer|required',

        ];
    }
}
