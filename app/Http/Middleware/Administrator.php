<?php

namespace App\Http\Middleware;

use Closure;
use Lib\Http\Request;
use Lib\Contracts\Http\Middleware;

class Administrator implements Middleware
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
        if (! auth()->logged() || ! auth()->user()->admin) {
            session()->flash('messages', ['danger' => 'You are not permitted to access this page.']);

            return redirect('/login');
        }

        return $next($request);
    }
}
