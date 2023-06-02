<?php

namespace App\Modules\Categories\Model;

use App\Http\Traits\HasImages;
use App\Http\Traits\HasTranslations;
use App\Modules\Ingredients\Model\Ingredient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes, HasTranslations, HasImages;

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

    public function ingredients()
    {
        return $this->morphedByMany(Ingredient::class, 'categorizable');
    }

    public function parent_category()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }
    public function sub_categories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
}
