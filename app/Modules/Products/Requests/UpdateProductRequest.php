<?php


namespace App\Modules\Products\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'name'				=> 'nullable' ,
			'description'				=> 'nullable' ,
			'price'				=> 'nullable' ,
            'image' => 'nullable',
        ];
    }
}
