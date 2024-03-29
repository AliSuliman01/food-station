<?php

namespace App\Modules\Users\Requests;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        dd($this->route()->parameters);

        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user()->id, 'id')],
            'photo_path' => ['required', 'string'],
            'password' => ['nullable', 'min:8'],
        ];
    }
}
