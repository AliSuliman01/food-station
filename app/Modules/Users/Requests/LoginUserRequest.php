<?php


namespace App\Modules\Users\Requests;


use App\Http\Requests\ApiFormRequest;

class LoginUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
			'email'				=> 'required|email' ,
            'password'				=> 'required' ,
        ];
    }
}
