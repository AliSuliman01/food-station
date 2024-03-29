<?php

namespace App\Filament\Resources\IngredientResource\Pages;

use App\Filament\Resources\IngredientResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIngredient extends CreateRecord
{
    protected static string $resource = IngredientResource::class;

    protected function getRedirectUrl(): string
    {
        return self::getResource()::getUrl('edit', ['record' => $this->record]);
    }
}
