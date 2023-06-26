<?php

namespace App\Exceptions;

use App\Helpers\Response;
use Exception;
use GraphQL\Error\ClientAware;
use Illuminate\Http\Request;
use Throwable;

class GeneralException extends Exception implements ClientAware
{
    protected $message;

    protected $detailedError;

    protected $code;

    public function __construct($message, $detailedError = null, $code = null, Throwable $previous = null)
    {
        $this->code = $code ?? 402;
        parent::__construct($message, $code, $previous);
        $this->message = $message;
        $this->detailedError = $detailedError;
    }

    public function render(Request $request)
    {
        return response()->json(Response::error($this->message, $this->code, $this->detailedError));
    }

    public function isClientSafe(): bool
    {
        return true;
    }
}
