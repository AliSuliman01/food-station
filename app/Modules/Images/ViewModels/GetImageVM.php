<?php


namespace App\Modules\Images\ViewModels;

use App\Modules\Images\Model\Image;
use Illuminate\Contracts\Support\Arrayable;

class GetImageVM implements Arrayable
{

    private $image;

    public function __construct($image)
    {
        $this->image = $image;
    }

    public function toArray()
    {
        return  $this->image;
    }
}
