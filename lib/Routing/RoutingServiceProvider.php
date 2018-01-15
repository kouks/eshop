<?php

namespace Lib\Routing;

use Lib\Core\Provider;

class RoutingServiceProvider extends Provider
{
    /**
     * The function that registers the provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRouter();

        $this->mapRoutes();
    }

    public function registerRouter()
    {
        $this->app->container->singleton('router', function () {
            return new Router();
        });
    }

    public function mapRoutes()
    {
        require config('routing.routes_dir').'/web.php';

        require config('routing.routes_dir').'/api.php';
    }
}
