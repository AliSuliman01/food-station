<?php

namespace App\Modules\Ingredients\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class IngredientDTO extends DataTransferObject
{
    /* @var integer|null */
    public $id;

    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,

        ]);
    }
}
