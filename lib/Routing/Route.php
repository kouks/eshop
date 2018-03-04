<?php

namespace Lib\Routing;

use Lib\Http\Request;

class Route
{
    /**
     * Array of validators.
     *
     * @var array
     */
    protected $validators;

    /**
     * The method this route is assigned to.
     *
     * @var string
     */
    protected $method;

    /**
     * The uri this route is assigned to.
     *
     * @var string
     */
    protected $uri;

    /**
     * The action to be performed upon matching the route. Accepts:
     *  1) A closure function
     *  2) A controller method reference.
     *
     * @var string
     */
    protected $action;

    /**
     * The middleware assigned to the route.
     *
     * @var array
     */
    protected $middleware = [];

    /**
     * The route parameters matched from the route.
     *
     * @var array
     */
    public $params = [];

    /**
     * Class constructor.
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  string|Closure  $action
     * @return void
     */
    public function __construct($method, $uri, $action)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->action = $action;

        $this->setValidators();
    }

    /**
     * Returns the method this route is assigned to.
     *
     * @return string
     */
    public function method()
    {
        return $this->method;
    }

    /**
     * Returns the uri this route is assigned to.
     *
     * @return string
     */
    public function uri()
    {
        return $this->uri;
    }

    /**
     * Returns the action to be performed upon matching the route.
     *
     * @return string|Closure
     */
    public function action()
    {
        return $this->action;
    }

    /**
     * Either adds a middleware or returns all of them.
     *
     * @param  string  $middleware
     * @return static|array
     */
    public function middleware($middleware = false)
    {
        if (! $middleware) {
            return $this->middleware;
        }

        $this->middleware[] = $middleware;

        return $this;
    }

    /**
     * Assigns a matched parameter from the request.
     *
     * @param  string  $key
     * @param  string  $value
     * @return void
     */
    public function assignParam($key, $value)
    {
        $this->params[$key] = $value;
    }

    /**
     * Sets the validators required to match the route.
     *
     * @return void
     */
    protected function setValidators()
    {
        $this->validators = [
            new Matching\UriValidator,
            new Matching\MethodValidator,
        ];
    }

    /**
     * Determines whether the route matches the request.
     *
     * @param  \Lib\Http\Request  $request
     * @return bool
     */
    public function matchesRequest(Request $request)
    {
        foreach ($this->validators as $validator) {
            if (! $validator->matches($this, $request)) {
                return false;
            }
        }

        return true;
    }
}
