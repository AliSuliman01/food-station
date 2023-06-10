<?php

namespace App\Modules\Restaurants\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class RestaurantDTO extends DataTransferObject
{
    /* @var integer|null */
    public $id;

    /* @var string|null */
    public $name;

    /* @var string|null */
    public $latitude;

    /* @var string|null */
    public $longitude;

    /* @var string|null */
    public $full_address;

    /* @var string|null */
    public $cover_image_path;

    /* @var integer|null */
    public $user_id;

    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,
            'name' => $request['name'] ?? null,
            'latitude' => $request['latitude'] ?? null,
            'longitude' => $request['longitude'] ?? null,
            'full_address' => $request['full_address'] ?? null,
            'cover_image_path' => $request['cover_image_path'] ?? null,
            'user_id' => $request['user_id'] ?? null,

        ]);
    }
}
