<?php

namespace Lib\Http;

use Closure;
use Exception;
use Lib\Routing\Route;
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
     * Handles the incoming request and generates a reponse.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response|void
     */
    public function handle(Request $request)
    {
        $this->request = $request;

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

        $parsedAction = $route->parsedAction();

        return new Response($parsedAction($this->request));
    }
}
