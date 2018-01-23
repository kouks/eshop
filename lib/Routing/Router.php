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
     * Adds a route to the collection.
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  string|Closure  $action
     * @return void
     */
    private function addRoute($method, $uri, $action)
    {
        $route = new Route($this, $method, $uri, $action);

        $this->routeCollection->push($route);
    }

    /**
     * Finds a matching route in the collection.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Routing\Route
     *
     * @throws \Lib\Exceptions\Routing\RouteNotFoundException
     */
    public function matchRoute(Request $request)
    {
        $route = $this->routeCollection->filter(function (Route $route) use ($request) {
            return $this->routeMatchesRequest($route, $request);
        })->first();

        if (is_null($route)) {
            throw new RouteNotFoundException('There is no matching route for this request.');
        }

        return $route;
    }

    /**
     * Determines whether the provided route matches the request.
     *
     * @param  \Lib\Routing\Route  $route
     * @param  \Lib\Http\Request  $request
     * @return bool
     */
    protected function routeMatchesRequest(Route $route, Request $request)
    {
        foreach ($route->getValidators() as $validator) {
            if (! $validator->matches($route, $request)) {
                return false;
            }
        }

        return true;
    }
}
