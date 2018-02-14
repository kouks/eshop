<?php

namespace Lib\Http\Concerns;

use Symfony\Component\HttpFoundation\Cookie;

trait ManagesResponse
{
    /**
     * Sets the http reponse status.
     *
     * @param  int  $status
     * @return static
     */
    public function status($status)
    {
        $this->setStatusCode($status);

        return $this;
    }

    /**
     * Adds cookies to the repsonse.
     *
     * @param  \Symfony\Component\HttpFoundation\Cookie  $cookie
     * @return static
     */
    public function withCookie(Cookie $cookie)
    {
        $this->headers->setCookie($cookie);

        return $this;
    }
}
