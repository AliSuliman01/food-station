<?php

namespace App\Modules\Users\Requests;

use App\Http\Requests\ApiFormRequest;

class LoginUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'exists:users,username,deleted_at,NULL'],
            'password' => 'required',
        ];
    }
}
