<?php

namespace App\Http\Traits;

use App\Modules\Translations\Model\Translation;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\App;

trait HasTranslations
{
    public function translation():MorphOne
    {
        return $this->morphOne(Translation::class, 'translatable')->where('language_code', App::getLocale());
    }

    public function translations():MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable');
    }
}
