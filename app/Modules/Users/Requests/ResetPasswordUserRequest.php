<?php

namespace App\Modules\Users\Requests;

use App\Http\Requests\ApiFormRequest;

class ResetPasswordUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'exists:users,email,deleted_at,NULL'],
            'reset_password_token' => ['required'],
            'password' => ['required'],
        ];
    }
}
