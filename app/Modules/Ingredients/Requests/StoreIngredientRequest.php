<?php


namespace App\Modules\Ingredients\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreIngredientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'				=> 'nullable' ,
            'description'				=> 'nullable' ,
            'image' => 'nullable',
            'category_id' => 'nullable'
        ];
    }
}
