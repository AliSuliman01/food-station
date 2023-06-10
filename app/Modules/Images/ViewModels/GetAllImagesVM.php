<?php

namespace App\Modules\Images\ViewModels;

use App\Modules\Images\Model\Image;
use Illuminate\Contracts\Support\Arrayable;

class GetAllImagesVM implements Arrayable
{
    public function toArray()
    {
        return Image::query()->get();
    }
}
