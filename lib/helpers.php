<?php

use Illuminate\Container\Container;

if (! function_exists('app')) {
    /**
     * The application container helper.
     *
     * @param  string  $abstract
     * @return mixed
     */
    function app($abstract = null)
    {
        return is_null($abstract)
            ? Container::getInstance()
            : Container::getInstance()->make($abstract);
    }
}

if (! function_exists('base_path')) {
    /**
     * The base path.
     *
     * @param  string $path
     * @return string
     */
    function base_path($path = '')
    {
        return app('path.base').'/'.ltrim($path, '/');
    }
}

if (! function_exists('config')) {
    /**
     * The functions that reads the config files.
     *
     * @param  string  $path
     * @return mixed
     */
    function config($path)
    {
        return app(Lib\Contracts\Support\Config::class)->read($path);
    }
}

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return value($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        return trim($value, '"');
    }
}

if (! function_exists('route')) {
    /**
     * Route helper.
     *
     * @return \Lib\Contracts\Routing\Route
     */
    function route()
    {
        return app('router');
    }
}

if (! function_exists('view')) {
    /**
     * View rendering helper.
     *
     * @param  string  $view
     * @param  array  $attributes
     * @return string
     */
    function view($view, array $attributes = [])
    {
        return app(Lib\Contracts\Templating\Engine::class)->render($view, $attributes);
    }
}
