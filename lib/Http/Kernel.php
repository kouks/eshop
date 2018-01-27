<?php

namespace Lib\Http;

use Closure;
use Exception;
use Lib\Core\Pipe;
use Lib\Routing\Route;
use Lib\Routing\BindingResolver;
use Lib\Contracts\Exceptions\Handler;
use Lib\Contracts\Http\Kernel as KernelInterface;

class Kernel implements KernelInterface
{
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
     * @return \Lib\Http\Response|void
     */
    public function handle(Request $request)
    {
        $this->request = $request;

        // We bind the request instance to the application container.
        app()->instance(Request::class, $request);

        try {
            $response = $this->sendRequestThroughRouter();
        } catch (Exception $e) {
            return app(Handler::class)->render($e);
        }

        return $response;
    }

    /**
     * Sends the incoming request through router, matching a route and then
     * resolving it.
     *
     * @return \Lib\Http\Response
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
        return function () {
            $action = $this->request->route()->parsedAction();

            $args = $this->bindingResolver->resolve($action);

            return $action(...$args);
        };
    }
}
