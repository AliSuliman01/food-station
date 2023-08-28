<?php

namespace App\Modules\Media\Actions;

use Illuminate\Support\Facades\Storage;

class UploadFileAction
{
    public static function execute($file)
    {
        return Storage::disk('public')->putFile('', $file);
    }
}
