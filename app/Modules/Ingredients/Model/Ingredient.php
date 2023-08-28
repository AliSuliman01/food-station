<?php

namespace App\Modules\Ingredients\Model;

use App\Classes\OptimizedInteractsWithMedia;
use App\Enums\MediaCollectionEnum;
use App\Http\Traits\HasCategories;
use App\Http\Traits\HasTranslations;
use App\Models\OptimizedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ingredient extends OptimizedModel implements HasMedia
{
    use HasFactory, SoftDeletes, HasTranslations, OptimizedInteractsWithMedia, HasCategories;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'pivot',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];

    public function image()
    {
        return $this->oneMedia()->where('collection_name', MediaCollectionEnum::IMAGE());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaCollectionEnum::IMAGE())->singleFile();
    }
}
