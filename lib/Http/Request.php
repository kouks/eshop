<?php

namespace Lib\Http;

class Request extends \Symfony\Component\HttpFoundation\Request
{
    public $params;

    public static function capture()
    {
        return static::createFromGlobals();
    }

    public function addParam($key, $value)
    {
        $this->params[$key] = $value;
    }
}
