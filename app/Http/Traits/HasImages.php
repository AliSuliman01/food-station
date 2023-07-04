<?php

namespace App\Http\Traits;

use App\Modules\Images\Model\Image;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasImages
{
    public function images():MorphMany
    {
        return $this->morphMany(Image::class, 'imagable')->where('is_main', '=', false);
    }

    public function main_image():MorphOne
    {
        return $this->morphOne(Image::class, 'imagable')->where('is_main', '=', true);
    }
}
