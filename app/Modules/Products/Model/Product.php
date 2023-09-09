<?php

namespace App\Modules\Products\Model;

use App\Classes\OptimizedInteractsWithMedia;
use App\Enums\MediaCollectionEnum;
use App\Http\Traits\HasCategories;
use App\Http\Traits\HasTranslations;
use App\Models\OptimizedModel;
use App\Modules\Ingredients\Model\Ingredient;
use App\Modules\Restaurants\Model\Restaurant;
use App\Modules\Users\Model\User;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends OptimizedModel implements HasMedia
{
    use HasFactory, SoftDeletes, HasTranslations, OptimizedInteractsWithMedia, HasCategories;

    protected $cascadeDeletes = [
        'translations',
        'images',
        'ingredients',
    ];

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
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

        public function ingredients(): BelongsToMany
        {
            return $this->belongsToMany(Ingredient::class);
        }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function customer_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_user_id');
    }

    public function main_image()
    {
        return $this->oneMedia()->where('collection_name', MediaCollectionEnum::MAIN_IMAGE());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaCollectionEnum::MAIN_IMAGE())->singleFile();
    }
}
