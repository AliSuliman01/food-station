<?php

namespace App\Helpers;

class Storage
{
    public static function putFile(string $path, \Illuminate\Http\File|string|\Illuminate\Http\UploadedFile $file): false|string
    {
        $filePath = \Illuminate\Support\Facades\Storage::disk('public')->putFile($path, $file);

        return "/storage/$filePath";
    }
}
