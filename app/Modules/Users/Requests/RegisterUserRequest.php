<?php


namespace App\Modules\Users\Requests;


use App\Http\Requests\ApiFormRequest;

class RegisterUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
			'name'				=> 'required' ,
			'id_token'				=> 'required' ,
            'photo_path'				=> 'nullable' ,
            'password'				=> 'required' ,
        ];
    }
}
