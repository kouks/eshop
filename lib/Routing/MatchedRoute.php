<?php

namespace Lib\Routing;

use Closure;
use Lib\Http\Request;

class MatchedRoute
{
    /**
     * The matched route instance.
     *
     * @var \Lib\Routing\Route
     */
    protected $route;

    /**
     * The request instance the route is matched with.
     *
     * @var \Lib\Http\Request
     */
    protected $request;

    /**
     * Class constructor.
     *
     * @param  \Lib\Routing\Route  $route
     * @param  \Lib\Http\Request  $request
     * @return void
     */
    public function __construct(Route $route, Request $request)
    {
        $this->route = $route;
        $this->request = $request;
    }

    /**
     * Parses the action for given route and returns it as a function reference.
     *
     * @return Closure
     */
    public function parsedAction()
    {
        $action = $this->route->action();

        if ($action instanceof Closure) {
            return $action;
        }

        return $this->parseControllerReference($action);
    }

    /**
     * Splits the controller reference to a controller and a method and
     * instantiates the controller.
     *
     * @param  string  $action
     * @return array
     */
    protected function parseControllerReference($action)
    {
        [$controller, $method] = explode('@', $action);
        $controller = config('http.controllers').'\\'.$controller;

        return [new $controller, $method];
    }

    /**
     * Retrieves all middleware assigned to the route.
     *
     * @return array
     */
    public function middleware()
    {
        return $this->route->middleware();
    }

    /**
     * Retrieves a route parameter by key.
     *
     * @param  string  $key
     * @return string
     */
    public function param($key)
    {
        return $this->route->params[$key] ?? null;
    }
}
