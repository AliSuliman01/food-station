<?php

namespace App\Classes;

use Spatie\DataTransferObject\DataTransferObject;

class OptimizedDataTransferObject extends DataTransferObject
{
    public function toArrayWithoutNulls(): array
    {
        return array_null_filter($this->toArray());
    }
}
