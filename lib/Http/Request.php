<?php

namespace Lib\Http;

use Lib\Routing\MatchedRoute;
use Lib\Http\Concerns\ValidatesSelf;

class Request extends \Symfony\Component\HttpFoundation\Request
{
    use ValidatesSelf;

    /**
     * The route that was matched with the request.
     *
     * @var \Lib\Routing\MatchedRoute
     */
    protected $route;

    /**
     * The user that is associated with the request
     *
     * @var array
     */
    protected $user;

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

    /**
     * Retrieves an input field from the request by a key.
     *
     * @param  string  $key
     * @return string
     */
    public function input($key)
    {
        return $this->request->get($key);
    }

    /**
     * Retrieves a query field from the request by a key.
     *
     * @param  string  $key
     * @return string
     */
    public function query($key)
    {
        return $this->query->get($key);
    }

    /**
     * Retrieves a cookie based on a provided key.
     *
     * @param  string  $key
     * @return string
     */
    public function cookie($key)
    {
        return $this->cookies->get($key);
    }

    /**
     * Retrieves a file based on a provided key.
     *
     * @param  string  $key
     * @return \Lib\Http\File
     */
    public function file($key)
    {
        return new File($this->files->get($key));
    }

    /**
     * Sets or gets the user that is logged in.
     *
     * @param  mixed  $user
     * @return mixed
     */
    public function user($user = null)
    {
        if (is_null($user)) {
            return $this->user;
        }

        $this->user = $user;
    }
}
