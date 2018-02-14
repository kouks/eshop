<?php

namespace Lib\Cookies;

use Lib\Core\Provider;

class CookieServiceProvider extends Provider
{
    /**
     * The function that registers the provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->container->singleton(\Lib\Contracts\Cookies\Factory::class, function () {
            return new Factory();
        });
    }
}
