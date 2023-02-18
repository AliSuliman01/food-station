<?php

namespace App\Modules\Translations\Actions;

use App\Modules\Translations\Model\Translation;
use App\Modules\Translations\DTO\TranslationDTO;

class StoreTranslationAction
{
    public static function execute(
    TranslationDTO $translationDTO
    ){

        return Translation::create(array_null_filter($translationDTO->toArray()));
    }
}
