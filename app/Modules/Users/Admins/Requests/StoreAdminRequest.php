<?php

namespace App\Modules\Users\Admins\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreAdminRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'username' => ['required', 'unique:users,username,NULL,id,deleted_at,NULL'],
            'email' => ['nullable', 'email', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'photo_path' => ['nullable', 'string'],
            'password' => ['required', 'min:8'],
        ];
    }
}
