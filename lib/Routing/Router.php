<?php

namespace Lib\Routing;

use Lib\Http\Request;
use Lib\Routing\Concerns\CreatesRoutes;
use Lib\Exceptions\Routing\RouteNotFoundException;

class Router
{
    use CreatesRoutes;

    /**
     * Collection of routes.
     *
     * @var \Lib\Routing\Route
     */
    protected $routeCollection;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeCollection = collect([]);
    }

    /**
     * Finds a matching route in the collection.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Routing\MatchedRoute
     *
     * @throws \Lib\Exceptions\Routing\RouteNotFoundException
     */
    public function matchRoute(Request $request)
    {
        $route = $this->routeCollection->filter(function (Route $route) use ($request) {
            return $route->matchesRequest($request);
        })->first();

        if (is_null($route)) {
            throw new RouteNotFoundException('There is no matching route for this request.');
        }

        return new MatchedRoute($route, $request);
    }

    /**
     * Adds a route to the collection.
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  string|Closure  $action
     * @return void
     */
    protected function addRoute($method, $uri, $action)
    {
        $route = new Route($method, $uri, $action);

        $this->routeCollection->push($route);

        return $route;
    }
}
