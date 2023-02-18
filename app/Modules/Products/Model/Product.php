<?php

namespace App\Modules\Products\Model;

use App\Http\Traits\HasImages;
use App\Http\Traits\HasTranslations;
use App\Modules\Images\Model\Image;
use App\Modules\Ingredients\Model\Ingredient;
use App\Modules\Translations\Model\Translation;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Product extends Model
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

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }
}
