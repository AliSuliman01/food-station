<?php

namespace App\Exceptions;

use App\Helpers\Response;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class GeneralException extends Exception
{
    protected $message;

    protected $detailed_error;

    protected $code;

    public function __construct($message, $detailed_error = null, $code = null, Throwable $previous = null)
    {
        $this->code = $code ?? 402;
        parent::__construct($message, $code, $previous);
        $this->message = $message;
        $this->detailed_error = $detailed_error;
    }

    public function render(Request $request)
    {
        return response()->json(Response::error($this->message, $this->code, $this->detailed_error));
    }
}
