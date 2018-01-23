<?php

namespace Lib\Core;

use Whoops;
use Illuminate\Container\Container;
use Symfony\Component\Dotenv\Dotenv;

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

        $this->registerExceptionHandlers();
        $this->registerBaseBindings();
        $this->registerProviders();

        $this->loadEnvironmentVariables();
    }

    /**
     * Registers the base path in the container.
     *
     * @return void
     */
    private function setBasePath()
    {
        $this->container->instance('path.base', $this->basePath);
    }

    /**
     * Registers the application exception handlers.
     *
     * @return void
     */
    protected function registerExceptionHandlers()
    {
        // We register the framework exception handler...
        $this->container->bind(
            'handler',
            \App\Exceptions\Handler::class
        );

        // As well as the Whoops library for handling exceptions.
        $whoops = new Whoops\Run;
        $whoops->pushHandler(new Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }
    /**
     * Registers the basic application bindings.
     *
     * @return void
     */
    private function registerBaseBindings()
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
    private function registerProviders()
    {
        foreach (config('app.providers') as $provider) {
            (new $provider($this))->register();
        }
    }

    /**
     * Loads all the variables from the .env file.
     *
     * @return void
     */
    private function loadEnvironmentVariables()
    {
        (new Dotenv())->load($this->basePath.'/.env');
    }
}
