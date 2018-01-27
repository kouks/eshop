<?php

namespace Lib\Http;

use Lib\Routing\MatchedRoute;

class Request extends \Symfony\Component\HttpFoundation\Request
{
    /**
     * The route that was matched with the request.
     *
     * @var \Lib\Routing\MatchedRoute
     */
    protected $route;

    /**
     * Captures the request from global variables.
     *
     * @return static
     */
    public static function capture()
    {
        return static::createFromGlobals();
    }

    /**
     * Assigns a route to the request.
     *
     * @param  \Lib\Routing\MatchedRoute  $route
     * @return void
     */
    public function assignMatchedRoute(MatchedRoute $route)
    {
        $this->route = $route;
    }

    /**
     * Retrieves the matched route.
     *
     * @return \Lib\Routing\MatchedRoute
     */
    public function route()
    {
        return $this->route;
    }

    /**
     * Retrieves a param from the route by specified key.
     *
     * @param  string  $key
     * @return string
     */
    public function param($key)
    {
        return $this->route->param($key);
    }
}
