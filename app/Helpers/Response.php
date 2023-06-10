<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

class Response
{
    public static function success($data = null)
    {
        return [
            'success' => true,
            'code' => 200,
            'data' => $data,
        ];
    }

    public static function error($message, $code, $detailed_error = null)
    {
        if (! App::isLocal()) {
            $detailed_error = null;
        }

        return [
            'success' => false,
            'code' => $code,
            'message' => $message,
            'detailed_error' => $detailed_error,
        ];
    }
}
