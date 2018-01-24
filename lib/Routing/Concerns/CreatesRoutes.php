<?php

namespace Lib\Routing\Concerns;

trait CreatesRoutes
{
    /**
     * Registers a route with the GET method.
     *
     * @param  string  $uri
     * @param  string|Closure  $action
     * @return \Lib\Routing\Route
     */
    public function get($uri, $action)
    {
        return $this->addRoute('GET', $uri, $action);
    }

    /**
     * Registers a route with the POST method.
     *
     * @param  string  $uri
     * @param  string|Closure  $action
     * @return \Lib\Routing\Route
     */
    public function post($uri, $action)
    {
        return $this->addRoute('POST', $uri, $action);
    }
}
