<?php

namespace Lib\Routing;

class Route
{
    protected $validators;

    public function __construct($router, $method, $uri, $action)
    {
        $this->router = $router;
        $this->method = $method;
        $this->uri = $uri;
        $this->action = $action;

        $this->setValidators();
    }

    protected function setValidators()
    {
        $this->validators = collect([
            new Matching\UriValidator,
            new Matching\MethodValidator,
        ]);
    }

    public function getValidators()
    {
        return $this->validators;
    }
}
