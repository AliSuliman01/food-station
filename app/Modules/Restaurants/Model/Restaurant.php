<?php

namespace App\Modules\Restaurants\Model;

use App\Classes\OptimizedInteractsWithMedia;
use App\Enums\MediaCollectionEnum;
use App\Models\OptimizedModel;
use App\Modules\Products\Model\Product;
use App\Modules\Users\Model\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends OptimizedModel
{
    use HasFactory, OptimizedInteractsWithMedia, SoftDeletes;

    protected $cascadeDeletes = [
        'products',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
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
