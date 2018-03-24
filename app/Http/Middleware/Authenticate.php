<?php

namespace App\Http\Middleware;

use Closure;
use Lib\Http\Request;
use Lib\Http\Kernel as Http;
use Lib\Contracts\Http\Middleware;

class Authenticate implements Middleware
{
    /**
     * Handle the request.
     *
     * @param  \Lib\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! auth()->logged()) {
            if ($request->wantsJson()) {
                return json(['error' => 'You need to be authenticated to access this endpoint.'])
                    ->status(Http::UNAUTHORIZED);
            }

            session()->flash('messages', ['danger' => 'You need to be logged in to access this page.']);

            return redirect('/login');
        }

        return $next($request);
    }
}
