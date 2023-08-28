<?php

namespace App\Modules\Categories\Model;

use App\Classes\OptimizedInteractsWithMedia;
use App\Enums\MediaCollectionEnum;
use App\Exceptions\CategoryExistenceException;
use App\Http\Traits\HasCategories;
use App\Http\Traits\HasTranslations;
use App\Models\OptimizedModel;
use App\Modules\Categorizable\Model\Categorizable;
use App\Modules\Ingredients\Model\Ingredient;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class Category extends OptimizedModel implements HasMedia
{
    use HasFactory, SoftDeletes, HasTranslations, OptimizedInteractsWithMedia, CascadeSoftDeletes, HasCategories;

    protected $cascadeDeletes = [
        'categorizables',
    ];

    public const AVAILABLE = 'available';

    public const MOST_BOUGHT = 'most_bought';

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

    public static function getByName($name):Category
    {
        $category = Category::where('name', $name)->first();
        if (! $category) {
            throw new CategoryExistenceException('undefined category: '.$name);
        }

        return $category;
    }

    public function ingredients(): MorphToMany
    {
        return $this->morphedByMany(Ingredient::class, 'categorizable');
    }

    public function categorizables()
    {
        return $this->hasMany(Categorizable::class);
    }

    public function image()
    {
        return $this->oneMedia()->where('collection_name', MediaCollectionEnum::IMAGE());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaCollectionEnum::IMAGE())->singleFile();
    }

    public function parent_categories()
    {
        return $this->categories();
    }

    public function sub_categories()
    {
        return $this->morphToMany(Category::class,'categorizable', 'categorizables', 'category_id', 'categorizable_id');
    }

}
