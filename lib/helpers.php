<?php

use Lib\Http\Response;
use Lib\Database\ModelFactory;
use Lib\Http\RedirectResponse;
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

if (! function_exists('cookie')) {
    /**
     * The cookie factory helper.
     *
     * @return \Lib\Contracts\Cookies\Factory
     */
    function cookie()
    {
        return app(Lib\Contracts\Cookies\Factory::class);
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

if (! function_exists('factory')) {
    /**
     * Runs the model factory for a provided model.
     *
     * @param  string  $model
     * @param  int  $count
     * @return mixed
     */
    function factory($model, $count = 1)
    {
        return new ModelFactory($model, $count);
    }
}

if (! function_exists('json')) {
    /**
     * Json response helper.
     *
     * @param  array  $content
     * @return \Lib\Http\Response
     */
    function json(array $content)
    {
        return new Response(
            json_encode($content),
            200,
            ['Content-Type' => 'application/json']
        );
    }
}

if (! function_exists('redirect')) {
    /**
     * Redirect response helper.
     *
     * @param  string  $url
     * @return \Lib\Http\RedirectResponse
     */
    function redirect($url)
    {
        return new RedirectResponse($url);
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

if (! function_exists('session')) {
    /**
     * Session factory helper.
     *
     * @return \Lib\Contracts\Session\Factory
     */
    function session()
    {
        return app(\Lib\Contracts\Session\Factory::class);
    }
}

if (! function_exists('view')) {
    /**
     * View rendering helper.
     *
     * @param  string  $view
     * @param  array  $attributes
     * @return \Lib\Http\Response
     */
    function view($view, array $attributes = [])
    {
        return new Response(
            app(Lib\Contracts\Templating\Engine::class)->render($view, $attributes),
            200,
            ['Content-Type' => 'text/html']
        );
    }
}
