<?php


namespace App\Modules\Categorizable\Model;


use App\Models\OptimizedModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorizable extends OptimizedModel
{
    use SoftDeletes;
}
