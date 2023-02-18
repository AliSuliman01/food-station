<?php


namespace App\Modules\Users\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'name'				=> 'required' ,
			'email'				=> 'required' ,
            'photo'				=> 'nullable' ,
            'password'				=> 'required' ,
        ];
    }
}
