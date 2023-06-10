<?php

namespace App\Modules\Translations\Actions;

use App\Modules\Translations\Model\Translation;

class DestroyTranslationAction
{
    public static function execute(
        Translation $translation
    ) {
        $translation->delete();

        return $translation;
    }
}
