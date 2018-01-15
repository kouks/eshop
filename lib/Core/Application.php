<?php

namespace Lib\Core;

use Illuminate\Container\Container;

class Application
{
    /**
     * The base application path.
     *
     * @var string
     */
    protected $basePath;

    /**
     * The application container instance.
     *
     * @var \Lib\Core\Container
     */
    public $container;

    /**
     * Class constructor.
     *
     * @param  string  $basePath
     * @return void
     */
    public function __construct($basePath)
    {
        $this->basePath = $basePath;
        $this->container = Container::getInstance();

        $this->setBasePath();
        $this->registerBaseBindings();
        $this->registerProviders();
    }

    /**
     * Registers the base path in the container.
     *
     * @return void
     */
    public function setBasePath()
    {
        $this->container->instance('path.base', $this->basePath);
    }

    /**
     * Registers the basic application bindings.
     *
     * @return void
     */
    public function registerBaseBindings()
    {
        $this->container->bind(
            \Lib\Contracts\Http\Kernel::class,
            \Lib\Http\Kernel::class
        );

        $this->container->bind(
            \Lib\Contracts\Support\Config::class,
            \Lib\Support\Config::class
        );
    }

    /**
     * Registers all servise providers.
     *
     * @return void
     */
    public function registerProviders()
    {
        foreach (config('app.providers') as $provider) {
            (new $provider($this))->register();
        }
    }
}
