<?php

namespace App\Modules\Users\Requests;

use App\Http\Requests\ApiFormRequest;

class RegisterUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'username' => ['required', 'unique:users,username,NULL,id,deleted_at,NULL'],
            'photo_path' => 'nullable',
            'password' => 'required',
        ];
    }
}
