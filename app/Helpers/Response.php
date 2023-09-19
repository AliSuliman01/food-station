<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

class Response
{
    public static function success($data = null, $message = null)
    {
        return [
            'success' => true,
            'code' => 200,
            'message' => $message,
            'data' => $data,
        ];
    }

    public static function error($message, $detailedError = null)
    {
        if (! App::isLocal()) {
            $detailedError = null;
        }

        return [
            'success' => false,
            'message' => $message,
            'detailed_error' => $detailedError,
        ];
    }
}
