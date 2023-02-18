<?php


namespace App\Modules\Images\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'id'				=> 'integer|required' ,
			'imagable_id'				=> 'required' ,
			'imagable_type'				=> 'nullable' ,
			'path'				=> 'nullable' ,

        ];
    }
}
