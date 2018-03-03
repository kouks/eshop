<?php

namespace Lib\Auth;

use App\Models\User;
use Lib\Http\Request;
use Lib\Contracts\Auth\Guard as GuardContract;

class Guard implements GuardContract
{
    /**
     * The logged in user, if any.
     *
     * @var \App\Models\User
     */
    protected $user;

    /**
     * Attemps to login the user based on API token cookie.
     *
     * @param  \Lib\Http\Request  $request
     * @return void
     */
    public function attempt(Request $request)
    {
        $request = app(\Lib\Http\Request::class);

        if (
            ! ($api_token = $request->cookie('api_token')) &&
            ! ($api_token = $request->header('Authorization'))
        ) {
            return;
        }

        $this->user = User::find(compact('api_token'));

        if (is_null($this->user)) {
            return;
        }

        $request->user($this->user);
    }

    /**
     * Returns whether there is a logged in user in the session.
     *
     * @return bool
     */
    public function logged()
    {
        return $this->user !== null;
    }

    /**
     * Returns the user instance.
     *
     * @return \App\Models\User
     */
    public function user()
    {
        return $this->user;
    }
}
