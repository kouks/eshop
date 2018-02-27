<?php

namespace Lib\Auth;

use Lib\Core\Provider;

class AuthServiceProvider extends Provider
{
    /**
     * The function that registers the provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->container->singleton(\Lib\Contracts\Auth\Guard::class, function () {
            return new Guard();
        });
    }
}
