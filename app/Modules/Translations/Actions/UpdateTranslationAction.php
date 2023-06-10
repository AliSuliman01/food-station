<?php

namespace App\Modules\Translations\Actions;

use App\Modules\Translations\DTO\TranslationDTO;
use App\Modules\Translations\Model\Translation;

class UpdateTranslationAction
{
    public static function execute(
        Translation $translation, TranslationDTO $translationDTO
    ) {
        $translation->update(array_null_filter($translationDTO->toArray()));

        return $translation;
    }
}
