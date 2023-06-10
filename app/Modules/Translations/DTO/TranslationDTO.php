<?php

namespace App\Modules\Translations\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class TranslationDTO extends DataTransferObject
{
    /* @var integer|null */
    public $id;

    /* @var integer|null */
    public $translatable_id;

    /* @var string|null */
    public $translatable_type;

    /* @var string|null */
    public $name;

    /* @var string|null */
    public $description;

    /* @var string|null */
    public $notes;

    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,
            'translatable_id' => $request['translatable_id'] ?? null,
            'translatable_type' => $request['translatable_type'] ?? null,
            'name' => $request['name'] ?? null,
            'description' => $request['description'] ?? null,
            'notes' => $request['notes'] ?? null,

        ]);
    }
}
