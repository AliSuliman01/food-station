<?php

namespace App\Modules\Translations\Actions;

use App\Modules\Translations\DTO\TranslationDTO;
use App\Modules\Translations\Model\Translation;

class StoreTranslationAction
{
    public static function execute(
        TranslationDTO $translationDTO
    ) {

        return Translation::create(array_null_filter($translationDTO->toArray()));
    }
}
