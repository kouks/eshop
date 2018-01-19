<?php

namespace Lib\Http;

use Closure;
use Lib\Routing\Route;
use Lib\Contracts\Http\Kernel as KernelInterface;

class Kernel implements KernelInterface
{
    /**
     * The web controllers namespace.
     *
     * @var string
     */
    protected $controllersNamespace = '\\App\\Http\\Controllers';

    /**
     * The request instance.
     *
     * @var \Lib\Http\Request
     */
    protected $request;

    /**
     * Handles the incoming request and generates a reponse.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function handle(Request $request)
    {
        $this->request = $request;

        return $this->generateResponse();
    }

    public function generateResponse()
    {
        $route = $this->findMatchingRoute();

        if ($route->action instanceof Closure) {
            return $this->handleClosureAction($route);
        }

        return $this->handleControllerAction($route);
    }

    public function findMatchingRoute()
    {
        return app('router')->matchRoute($this->request);
    }

    public function handleClosureAction(Route $route)
    {
        $action = $route->action;

        return $this->normalizeReponse($action($this->request));
    }

    public function handleControllerAction(Route $route)
    {
        [$controller, $action] = explode('@', $route->action);

        $controller = $this->controllersNamespace.'\\'.$controller;
        $controller = new $controller;

        return $this->normalizeReponse($controller->$action($this->request));
    }

    public function normalizeReponse($response)
    {
        return new Response($response);
    }
}
