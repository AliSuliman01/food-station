<?php

namespace App\Modules\Categories\Model;

use App\Http\Traits\HasImages;
use App\Http\Traits\HasTranslations;
use App\Models\OptimizedModel;
use App\Modules\Ingredients\Model\Ingredient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends OptimizedModel
{
    use HasFactory, SoftDeletes, HasTranslations, HasImages;

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
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function ingredients():MorphToMany
    {
        return $this->morphedByMany(Ingredient::class, 'categorizable');
    }

    public function parent_category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function sub_categories():HasMany
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
}
