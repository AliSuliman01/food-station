<?php

namespace App\Modules\Images\Actions;

use App\Modules\Images\Model\Image;
use App\Modules\Images\DTO\ImageDTO;

class UpdateImageAction
{
    public static function execute(
        Image $image,ImageDTO $imageDTO
    ){
        $image->update(array_null_filter($imageDTO->toArray()));
        return $image;
    }
}
