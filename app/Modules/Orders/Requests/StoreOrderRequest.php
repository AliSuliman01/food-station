<?php

namespace App\Modules\Orders\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreOrderRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id,deleted_at,NULL'],
            'prepared_by_user_id' => ['nullable', 'exists:users,id,deleted_at,NULL'],
            'carts' => ['required', 'array'],
            'carts.*.product_id' => ['required', 'exists:products,id,deleted_at,NULL'],
            'carts.*.quantity' => ['required', 'integer'],
            'carts.*.notes' => ['nullable', 'string'],
        ];
    }
}
