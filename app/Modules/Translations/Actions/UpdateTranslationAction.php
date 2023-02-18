<?php

namespace App\Modules\Translations\Actions;

use App\Modules\Translations\Model\Translation;
use App\Modules\Translations\DTO\TranslationDTO;

class UpdateTranslationAction
{
    public static function execute(
        Translation $translation,TranslationDTO $translationDTO
    ){
        $translation->update(array_null_filter($translationDTO->toArray()));
        return $translation;
    }
}
