<?php


namespace App\Modules\Products\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'price'				=> 'nullable' ,
			'name'				=> 'nullable' ,
			'description'				=> 'nullable' ,
            'image' => 'nullable',
        ];
    }
}
