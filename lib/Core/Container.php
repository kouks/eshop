<?php

namespace Lib\Core;

class Container
{
    /**
     * The current globally available container (if any).
     *
     * @var static
     */
    protected static $instance;

    /**
     * The currently assigned bindings.
     *
     * @var array
     */
    protected $bindings = [];

    /**
     * Creates a singleton in the app container.
     *
     * @param  string  $abstract
     * @param  mixed  $concrete
     * @return void
     */
    public function singleton($abstract, $concrete)
    {
        $this->bind($abstract, $concrete, true);
    }

    /**
     * Creates an object in the app container.
     *
     * @param  string  $abstract
     * @param  string  $concrete
     * @return void
     */
    public function make($abstract, $concrete)
    {
        $this->bind($abstract, $concrete, false);
    }

    /**
     * Performs the actual binding.
     *
     * @param  string  $abstract
     * @param  string  $concrete
     * @return void
     */
    protected function bind($abstract, $concrete, $shared)
    {
        $this->bindings[$abstract] = compact('concrete', 'shared');
    }

    /**
     * Resolves an abstract from the container.
     *
     * @param  string  $abstract
     * @return mixed
     */
    public function resolve($abstract)
    {
        ['concrete' => $concrete, 'shared' => $shared] = $this->bindings[$abstract];

        return $shared ? $concrete : new $concrete;
    }

    /**
     * Set the globally available instance of the container.
     *
     * @return static
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }
}
