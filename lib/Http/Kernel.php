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
     * @return \Lib\Http\Response
     */
    public function handle(Request $request)
    {
        $this->request = $request;

        // We bind the request instance to the application container.
        app()->instance(Request::class, $request);

        try {
            $content = $this->sendRequestThroughRouter();
        } catch (Exception $e) {
            $content = app(Handler::class)->render($e);
        }

        return $this->prepareResponse($content);
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

            $args = $this->bindingResolver->resolve($action);

            return $action(...$args);
        };
    }

    /**
     * Prepares the response from various data types returned by the actions.
     *
     * @param  mixed  $content
     * @return \Lib\Http\Response
     */
    protected function prepareResponse($content)
    {
        if ($content instanceof RedirectResponse) {
            return $content;
        }

        $response = new Response();

        if (is_array($content)) {
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent(json_encode($content));
        } else {
            $response->headers->set('Content-Type', 'text/html');
            $response->setContent($content);
        }

        return $response->prepare($this->request);
    }
}
