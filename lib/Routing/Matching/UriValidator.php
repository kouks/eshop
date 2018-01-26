<?php

namespace Lib\Routing\Matching;

use Lib\Http\Request;
use Lib\Routing\Route;

class UriValidator implements Validator
{
    /**
     * Determine whether the provided route matches the request.
     *
     * @param  \Lib\Routing\Route  $route
     * @param  \Lib\Http\Request  $request
     * @return bool
     */
    public function matches(Route $route, Request $request)
    {
        $regex = $this->createRegexFromRouteUri($route);
        $location = $this->getRequestLocation($request);
        $matched = (bool) preg_match($regex, $location, $matches);

        foreach ($matches as $key => $value) {
            if (! is_int($key)) {
                $route->assignParam($key, $value);
            }
        }

        return $matched;
    }

    /**
     * Strips the URI from query.
     *
     * @param  \Lib\Http\Request  $request
     * @return string
     */
    protected function getRequestLocation(Request $request)
    {
        return explode('?', $request->server->get('REQUEST_URI'))[0];
    }

    /**
     * Creates a regex string to be matched with the requested URI.
     *
     * @param  \Lib\Routing\Route  $route
     * @return string
     */
    protected function createRegexFromRouteUri(Route $route)
    {
        $accepted = config('routing.accepted_route_params_regex');

        return '/^'.preg_replace('/\\\{([a-z_]+)\\\}/', '(?P<$1>'.$accepted.')', preg_quote($route->uri(), '/')).'$/';
    }
}
