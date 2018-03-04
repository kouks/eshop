<?php

namespace Lib\Database;

use Lib\Core\Provider;

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
    }
}
