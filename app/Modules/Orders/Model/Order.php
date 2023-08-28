<?php

namespace App\Modules\Orders\Model;

use App\Models\OptimizedModel;
use App\Modules\Carts\Model\Cart;
use App\Modules\Users\Model\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends OptimizedModel
{
    use SoftDeletes, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prepared_by_user()
    {
        return $this->belongsTo(User::class, 'prepared_by_user_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
