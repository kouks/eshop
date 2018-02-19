<?php

namespace Lib\Session;

use Lib\Core\Provider;

class SessionServiceProvider extends Provider
{
    /**
     * The function that registers the provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->container->singleton(\Lib\Contracts\Session\Factory::class, function () {
            return new Factory();
        });

        session()->flush();
    }
}
