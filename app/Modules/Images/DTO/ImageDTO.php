<?php

namespace App\Modules\Images\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ImageDTO extends DataTransferObject
{
    /* @var integer|null */
    public $id;

    /* @var integer|null */
    public $imagable_id;

    /* @var string|null */
    public $imagable_type;

    /* @var string|null */
    public $path;

    /* @var boolean|null */
    public $is_main;

    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,
            'imagable_id' => $request['imagable_id'] ?? null,
            'imagable_type' => $request['imagable_type'] ?? null,
            'path' => $request['path'] ?? null,
            'is_main' => $request['is_main'] ?? null,

        ]);
    }
}
