<?php

namespace App\Http\Middleware;

use App\Exceptions\GeneralException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

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
        throw new GeneralException('unauthenticated', null, 401);
    }
}
