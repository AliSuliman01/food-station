<?php

namespace App\Modules\Categories\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class CategoryDTO extends DataTransferObject
{
    /* @var integer|null */
    public $id;

    /* @var integer|null */
    public $parent_category_id;

    /* @var integer|null */
    public $name;

    /* @var string|null */
    public $slug;

    /* @var boolean|null */
    public $can_select_many;

    /* @var boolean|null */
    public $is_selectable;

    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,
            'parent_category_id' => $request['parent_category_id'] ?? null,
            'name' => $request['name'] ?? null,
            'slug' => $request['slug'] ?? null,
            'can_select_many' => $request['can_select_many'] ?? null,
            'is_selectable' => $request['is_selectable'] ?? null,

        ]);
    }
}
