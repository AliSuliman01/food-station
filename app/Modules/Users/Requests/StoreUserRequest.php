<?php

namespace App\Modules\Users\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'photo_path' => ['nullable', 'string'],
            'password' => ['required', 'min:8'],
        ];
    }
}
