<?php

namespace App\Http\Middleware;

use App\Exceptions\GeneralException;
use App\Exceptions\RequestException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        throw new GeneralException('unauthorized', null, 401);
    }
}
