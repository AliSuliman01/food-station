<?php

namespace App\Modules\Restaurants\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreRestaurantRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'full_address' => 'nullable',
            'cover_image_path' => 'required',
            'user_id' => 'required',
            'images' => ['nullable'],
            'images.*.path' => ['required'],

        ];
    }
}
