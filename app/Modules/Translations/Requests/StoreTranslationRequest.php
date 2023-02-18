<?php


namespace App\Modules\Translations\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreTranslationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'id'				=> 'integer|required' ,
			'translatable_id'				=> 'required' ,
			'translatable_type'				=> 'nullable' ,
			'name'				=> 'nullable' ,
			'description'				=> 'nullable' ,
			'notes'				=> 'nullable' ,

        ];
    }
}
