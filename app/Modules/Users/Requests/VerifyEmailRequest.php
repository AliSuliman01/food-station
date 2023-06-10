<?php

namespace App\Modules\Users\Requests;

use App\Http\Requests\ApiFormRequest;

class VerifyEmailRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'verification_code' => 'required|exists:users,verification_code,deleted_at,NULL',
        ];
    }
}
