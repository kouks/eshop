<?php

namespace Lib\Http;

class Response extends \Symfony\Component\HttpFoundation\Response
{
    protected $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function send()
    {
        echo $this->response;
    }
}
