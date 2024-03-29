<?php

namespace App\Filament\Resources;

use App\Enums\CategoryEnum;
use App\Enums\MediaCollectionEnum;
use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers\TranslationsRelationManager;
use App\Modules\Categories\Model\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\SpatieMediaLibraryFileUpload::make('main_image')
                    ->collection(MediaCollectionEnum::MAIN_IMAGE)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\Select::make('parent_categories')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->native(false)
                    ->relationship('parent_categories', 'name')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')->maxLength(255),
                    ]),
                Forms\Components\Checkbox::make('is_selectable')
                    ->reactive(),
                Forms\Components\Checkbox::make('can_select_many')
                    ->visible(function (callable $get) {
                        return $get('is_selectable');
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('main_image')
                    ->circular()
                    ->collection(MediaCollectionEnum::MAIN_IMAGE),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('translation.name')
                    ->searchable(),
                Tables\Columns\CheckboxColumn::make('is_selectable'),
                Tables\Columns\TextColumn::make('parent_categories.name')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(function (Category $category) {
                        return ! CategoryEnum::hasKey($category->name);
                    }),
                Tables\Actions\DeleteAction::make()
                    ->visible(function (Category $category) {
                        return ! CategoryEnum::hasKey($category->name);
                    }),
            ])
            ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make(),
                    ]),
            ])
            ->emptyStateActions([
                    Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TranslationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }
}
