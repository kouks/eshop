<?php

namespace App\Http\Middleware;

use Closure;
use Lib\Http\Request;
use Lib\Http\Response;
use Lib\Contracts\Http\Middleware;

class Authenticate implements Middleware
{
    /**
     * Handle the request.
     *
     * @param  \Lib\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Lib\Exceptions\Auth\AuthenticationException
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
