<?php

namespace App\Exceptions;

use App\Helpers\Response;
use Illuminate\Http\Request;
use Exception;
use Throwable;

class GeneralException extends Exception
{
    protected $message;
    protected $detailed_error;
    protected $code;
    protected $isLogin;

    public function __construct($message,$detailed_error = null, $code = null, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = $message;
        $this->detailed_error = $detailed_error;
        $this->code = $code ?? 402;
    }

    public function render(Request $request)
    {
        return response()->json(Response::error($this->message,$this->code, $this->detailed_error));
    }
}
