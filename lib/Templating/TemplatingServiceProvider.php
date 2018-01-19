<?php

namespace Lib\Templating;

use Lib\Core\Provider;
use Philo\Blade\Blade;

class TemplatingServiceProvider extends Provider
{
    /**
     * The function that registers the provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->container->singleton('templating.blade', function () {
            return new BladeEngine(new Blade(config('templating.views_dir'), config('templating.view_cache_dir')));
        });

        $this->app->container->singleton(\Lib\Contracts\Templating\Engine::class, function () {
            return app('templating.'.config('templating.engine'));
        });
    }
}
