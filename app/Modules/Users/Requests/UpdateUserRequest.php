<?php


namespace App\Modules\Users\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'name'				=> 'nullable' ,
			'email'				=> 'nullable' ,
			'photo'				=> 'nullable' ,
            'password'			=> 'nullable' ,
        ];
    }
}
