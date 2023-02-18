<?php


namespace App\Http\Traits;


use App\Modules\Translations\Model\Translation;
use Illuminate\Support\Facades\App;

trait HasTranslations
{
    public function translation()
    {
        return $this->morphOne(Translation::class, 'translatable')->where('language_code', App::getLocale());
    }
    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }
}
