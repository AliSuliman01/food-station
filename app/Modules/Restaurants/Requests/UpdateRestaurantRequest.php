<?php

namespace App\Modules\Restaurants\Requests;

use App\Http\Requests\ApiFormRequest;

class UpdateRestaurantRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'full_address' => 'nullable',
            'cover_image_path' => 'nullable',
            'user_id' => 'required',
            'images' => ['nullable'],
            'images.*.id' => ['required', 'exists:images,id,deleted_at,NULL'],
            'images.*.path' => ['required'],
        ];
    }
}
