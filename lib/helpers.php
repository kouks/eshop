<?php

use Illuminate\Container\Container;
use Lib\Http\Responses\TemplateResponse;

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
     * @return \Lib\Http\Responses\TemplateResponse
     */
    function view($view, array $attributes = [])
    {
        return new TemplateResponse(
            app(Lib\Contracts\Templating\Engine::class)->render($view, $attributes)
        );
    }
}
