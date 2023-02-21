<?php


namespace App\Modules\Restaurants\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'name'				=> 'required' ,
			'latitude'				=> 'nullable' ,
			'longitude'				=> 'nullable' ,
			'full_address'				=> 'nullable' ,
			'cover_image'				=> 'required' ,
			'user_id'				=> 'required' ,

        ];
    }
}
