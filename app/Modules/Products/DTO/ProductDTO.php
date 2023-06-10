<?php

namespace App\Modules\Products\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ProductDTO extends DataTransferObject
{
    /* @var integer|null */
    public $id;

    /* @var double|null */
    public $price;

    /* @var integer|null */
    public $restaurant_id;

    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,
            'price' => $request['price'] ?? null,
            'restaurant_id' => $request['restaurant_id'] ?? null,
        ]);
    }
}
