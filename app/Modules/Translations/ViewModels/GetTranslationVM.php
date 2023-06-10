<?php

namespace App\Modules\Translations\ViewModels;

use Illuminate\Contracts\Support\Arrayable;

class GetTranslationVM implements Arrayable
{
    private $translation;

    public function __construct($translation)
    {
        $this->translation = $translation;
    }

    public function toArray()
    {
        return $this->translation;
    }
}
