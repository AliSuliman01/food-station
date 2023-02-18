<?php


namespace App\Modules\Translations\ViewModels;

use App\Modules\Translations\Model\Translation;
use Illuminate\Contracts\Support\Arrayable;

class GetAllTranslationsVM implements Arrayable
{
    public function toArray()
    {
        return Translation::query()->get();
    }
}
