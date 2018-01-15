<?php

namespace Lib\Routing;

use Lib\Http\Request;

class Router
{
    protected $collection;

    public function __construct()
    {
        $this->collection = collect([]);
    }

    public function get($uri, $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function addRoute($method, $uri, $action)
    {
        $route = new Route($this, $method, $uri, $action);

        $this->collection->push($route);

        return $route;
    }

    public function matchRoute(Request $request)
    {
        return $this->collection->filter(function (Route $route) use ($request) {
            return ! $route->getValidators()->filter(function (Matching\Validator $validator) use ($request, $route) {
                return ! $validator->matches($route, $request);
            })->count();
        })->first();
    }
}
