<?php

namespace Lib\Contracts\Auth;

use Lib\Http\Request;

interface Guard
{
    /**
     * Attemps to login the user based on API token cookie.
     *
     * @param  \Lib\Http\Request  $request
     * @return void
     */
    public function attempt(Request $request);

    /**
     * Returns whether there is a logged in user in the session.
     *
     * @return bool
     */
    public function logged();

    /**
     * Returns the user instance.
     *
     * @return \App\Models\User
     */
    public function user();
}
