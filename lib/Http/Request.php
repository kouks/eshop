<?php

namespace Lib\Http;

use Lib\Routing\MatchedRoute;

class Request extends \Symfony\Component\HttpFoundation\Request
{
    protected $route;

    public static function capture()
    {
        return static::createFromGlobals();
    }

    public function assignMatchedRoute(MatchedRoute $route)
    {
        $this->route = $route;
    }
}
