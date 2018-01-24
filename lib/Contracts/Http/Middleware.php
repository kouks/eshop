<?php

namespace Lib\Contracts\Http;

use Closure;
use Lib\Http\Request;

interface Middleware
{
    /**
     * Handle the request.
     *
     * @param  \Lib\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next);
}
