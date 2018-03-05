<?php

namespace Lib\Http;

use Exception;
use Lib\Core\Pipe;
use Lib\Routing\Route;
use Lib\Routing\BindingResolver;
use Lib\Contracts\Exceptions\Handler;
use Lib\Contracts\Http\Kernel as KernelInterface;

class Kernel implements KernelInterface
{
    const OK = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    const NOT_FOUND = 404;
    const UNAUTHORIZED = 401;
    const UNPROCESSABLE_ENTITY = 422;

    /**
     * The request instance.
     *
     * @var \Lib\Http\Request
     */
    protected $request;

    /**
     * The implicit binding resolver isntance.
     *
     * @var \Lib\Routing\BindingResolver
     */
    protected $bindingResolver;

    /**
     * Class constructor.
     *
     * @param  \Lib\Routing\BindingResolver  $bindingResolver
     * @return void
     */
    public function __construct(BindingResolver $bindingResolver)
    {
        $this->bindingResolver = $bindingResolver;
    }

    /**
     * Handles the incoming request and generates a reponse.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function handle(Request $request)
    {
        $this->request = $request;

        // We bind the request instance to the application container.
        app()->instance(Request::class, $request);

        // We attempt to login a user based on an API token.
        app(\Lib\Contracts\Auth\Guard::class)->attempt($request);

        try {
            $response = $this->sendRequestThroughRouter();
        } catch (Exception $e) {
            $response = app(Handler::class)->render($request, $e);
        }

        return $response->prepare($this->request);
    }

    /**
     * Sends the incoming request through router, matching a route and then
     * resolving it.
     *
     * @return mixed
     */
    protected function sendRequestThroughRouter()
    {
        $this->request->assignMatchedRoute(
            $route = app('router')->matchRoute($this->request)
        );

        $middleware = collect(config('http.global_middleware'))->merge($route->middleware())->map(function ($item) {
            $middleware = config('http.middleware_names')[$item];

            return new $middleware;
        });

        return (new Pipe())
            ->pass($this->request)
            ->through($middleware)
            ->finally($this->initiateRouteAction());
    }

    /**
     * Replaces implicing binding on a route action and initiates it.
     *
     * @return \Closure
     */
    protected function initiateRouteAction()
    {
        return function (Request $request) {
            $action = $request->route()->parsedAction();

            $args = $this->bindingResolver->resolve($request, $action);

            return $action(...$args);
        };
    }
}
