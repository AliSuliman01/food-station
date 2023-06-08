<?php


namespace App\Modules\Settings\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'id'				=> 'integer|required' ,
			'group'				=> 'string|required' ,
			'name'				=> 'string|required' ,
			'locked'				=> 'integer|required' ,
			'payload'				=> 'integer|required' ,

        ];
    }
}
