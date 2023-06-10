<?php

namespace App\Modules\Users\Requests;

use App\Http\Requests\ApiFormRequest;

class UpdateUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'nullable',
            'email' => ['required', 'unique:users,email,'.$this->user.',id,deleted_at,NULL'],
            'photo' => 'nullable',
            'password' => 'nullable',
        ];
    }
}
