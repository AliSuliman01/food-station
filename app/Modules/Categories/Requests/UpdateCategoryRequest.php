<?php


namespace App\Modules\Categories\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'parent_category_id'				=> 'integer|nullable' ,
            'name'				=> 'required' ,
            'description'				=> 'nullable' ,
            'image' => 'nullable',
        ];
    }
}
