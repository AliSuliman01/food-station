<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\MediaLibrary\InteractsWithMedia;

trait OptimizedInteractsWithMedia
{
    use InteractsWithMedia;

    public function oneMedia(): MorphOne
    {
        return $this->morphOne(config('media-library.media_model'), 'model');
    }
}
