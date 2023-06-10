<?php

namespace App\Http\Traits;

use App\Modules\Images\Model\Image;

trait HasImages
{
    public function images()
    {
        return $this->morphMany(Image::class, 'imagable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imagable');
    }
}
