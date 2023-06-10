<?php

namespace App\Modules\Settings\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class SettingDTO extends DataTransferObject
{
    /* @var integer|null */
    public $id;

    /* @var string|null */
    public $group;

    /* @var string|null */
    public $name;

    /* @var boolean|null */
    public $locked;

    /* @var string|null */
    public $payload;

    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,
            'group' => $request['group'] ?? null,
            'name' => $request['name'] ?? null,
            'locked' => $request['locked'] ?? null,
            'payload' => $request['payload'] ?? null,

        ]);
    }
}
