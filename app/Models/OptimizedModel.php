<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class OptimizedModel extends Model
{
    public function updateRelation($relation, array $data, $primaryKeyName = 'id')
    {
        DB::transaction(function () use ($relation, $data, $primaryKeyName) {
            if (is_object($data)) {
                $data = [$data];
            }
            $ids = [];
            foreach ($data as $item) {
                if (isset($item[$primaryKeyName])) {
                    $this->{$relation}()
                        ->where($primaryKeyName, $item[$primaryKeyName])
                        ->update(array_filter($item, function ($field) {
                        return $field !== null;
                    }));
                    array_push($ids, $item[$primaryKeyName]);
                } else {
                    $model = $this->{$relation}()->create(array_null_filter($item));
                    array_push($ids, $model->$primaryKeyName);
                }
            }
            $this->{$relation}()->whereNotIn($primaryKeyName, $ids)->delete();
        });

        return $this->{$relation}()->get();
    }
}
