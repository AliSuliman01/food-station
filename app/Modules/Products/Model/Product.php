<?php

namespace App\Modules\Products\Model;

use App\Http\Traits\HasCategories;
use App\Http\Traits\HasImages;
use App\Http\Traits\HasTranslations;
use App\Models\OptimizedModel;
use App\Modules\Ingredients\Model\Ingredient;
use App\Modules\Restaurants\Model\Restaurant;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends OptimizedModel
{
    use HasFactory, SoftDeletes, HasTranslations, HasImages, HasCategories;

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

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
