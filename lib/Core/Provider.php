<?php

namespace Lib\Core;

abstract class Provider
{
    /**
     * The application instance.
     *
     * @var \Lib\Core\Application
     */
    protected $app;

    /**
     * Class constructor.
     *
     * @param  \Lib\Core\Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * The function that registers the provider.
     *
     * @return void
     */
    abstract public function register();
}
