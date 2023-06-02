<?php


namespace App\Modules\Users\Requests;


use App\Http\Requests\ApiFormRequest;

class UserLoginRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
			'mobile_phone'				=> 'required' ,
            'password'				=> 'required' ,
        ];
    }
}
