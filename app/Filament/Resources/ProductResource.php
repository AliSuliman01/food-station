<?php

namespace App\Filament\Resources;

use App\Enums\ProductStatusEnum;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers\TranslationsRelationManager;
use App\Modules\Products\Model\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('price'),
                Forms\Components\TextInput::make('rate')->numeric()->minValue(0)->maxValue(5),
                Forms\Components\Select::make('restaurant_id')->relationship('restaurant', 'name'),
                Forms\Components\Select::make('customer_user_id')->relationship('customer_user', 'name'),
                Forms\Components\TimePicker::make('preparing_time')
                    ->native(false)
                    ->seconds(false),
                Forms\Components\Select::make('status')->options(ProductStatusEnum::asSelectArray()),
                Forms\Components\Select::make('type')->options(ProductStatusEnum::asSelectArray()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('rate'),
                Tables\Columns\TextColumn::make('restaurant.name'),
                Tables\Columns\TextColumn::make('customer_user.name'),
                Tables\Columns\TextColumn::make('customer_user.name'),
                Tables\Columns\TextColumn::make('preparing_time'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('type'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TranslationsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
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
        return 4;
    }
}