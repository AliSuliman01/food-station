<?php

namespace App\Modules\Translations\Data;

use Spatie\LaravelData\Data;

class TranslationData extends Data
{
    public function __construct(
        public ?string $name = null,
        public ?string $language_code = null,
        public ?string $description = null,
        public ?string $notes = null,
    )
    {
    }
}
