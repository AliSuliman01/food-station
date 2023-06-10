<?php

namespace App\Modules\Users\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => ['required', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'photo' => 'nullable',
            'password' => 'required',
        ];
    }
}
