<?php

namespace App\Modules\Images\Actions;

use App\Modules\Images\DTO\ImageDTO;
use App\Modules\Images\Model\Image;

class StoreImageAction
{
    public static function execute(
        ImageDTO $imageDTO
    ) {

        return Image::create(array_null_filter($imageDTO->toArray()));
    }
}
