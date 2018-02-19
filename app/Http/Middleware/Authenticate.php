<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
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
        if (! $api_token = $request->cookie('api_token')) {
            return $this->reject();
        }

        $user = User::find(compact('api_token'));

        if (is_null($user)) {
            return $this->reject();
        }

        $request->user($user);

        return $next($request);
    }

    /**
     * Rejectrs the request.
     *
     * @return \Lib\Http\Response
     */
    protected function reject()
    {
        session()->flash('messages', ['danger' => 'You need to be logged in to access this page.']);

        return redirect('/login');
    }
}
