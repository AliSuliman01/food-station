<?php


namespace App\Modules\Categories\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'parent_category_id'				=> 'integer|nullable' ,
            'name'				=> 'string|required' ,
            'description'				=> 'string|nullable' ,
            'image' => 'nullable',
        ];
    }
}
