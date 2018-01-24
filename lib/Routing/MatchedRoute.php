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
     * The route parameters matched from the route.
     *
     * @var array
     */
    public $params = [];

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

        $this->assignRequestParams();
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

        [$controller, $method] = $this->parseControllerReference($action);

        return $controller->$method;
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
        $controller = config('app.controllers').'\\'.$controller;

        return [new $controller, $method];
    }

    /**
     * Assigns parameters from the request to the route.
     *
     * @return void
     */
    protected function assignRequestParams()
    {
        //
    }
}
