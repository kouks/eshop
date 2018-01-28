<?php

namespace Lib\Database;

use Lib\Core\Provider;
use Lib\Database\Connection;

class DatabaseServiceProvider extends Provider
{
    /**
     * The function that registers the provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->container->singleton(\Lib\Contracts\Database\Connection::class, function () {
            return new Connection(config('database.mongodb'));
        });

        $this->app->container->bind('builder', function () {
            return new Builder(app(\Lib\Contracts\Database\Connection::class));
        });
    }
}
