<?php

namespace App\Modules\Images\Actions;

use App\Modules\Images\Model\Image;

class DestroyImageAction
{
    public static function execute(
        Image $image
    ) {
        $image->delete();

        return $image;
    }
}
