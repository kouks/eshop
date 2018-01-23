<?php

namespace Lib\Routing\Concerns;

trait CreatesRoutes
{
    /**
     * Registers a route with the GET method.
     *
     * @param  string  $uri
     * @param  string|Closure  $action
     * @return void
     */
    public function get($uri, $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    /**
     * Registers a route with the POST method.
     *
     * @param  string  $uri
     * @param  string|Closure  $action
     * @return void
     */
    public function post($uri, $action)
    {
        $this->addRoute('POST', $uri, $action);
    }
}
