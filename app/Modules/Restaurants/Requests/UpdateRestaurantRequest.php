<?php


namespace App\Modules\Restaurants\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'name'				=> 'required' ,
			'latitude'				=> 'nullable' ,
			'longitude'				=> 'nullable' ,
			'full_address'				=> 'nullable' ,
			'cover_image'				=> 'nullable' ,
			'user_id'				=> 'required' ,

        ];
    }
}
