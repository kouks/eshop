<?php

namespace Lib\Cookies;

use Symfony\Component\HttpFoundation\Cookie;
use Lib\Contracts\Cookies\Factory as FactoryContract;

class Factory implements FactoryContract
{
    /**
     * Create a new cookie instance.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  int  $minutes
     * @param  bool  $httpOnly
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    public function bake($name, $value, $minutes = 0, $httpOnly = true)
    {
        $time = time() + $minutes * 60;

        return new Cookie($name, $value, $time, null, null, false, $httpOnly);
    }

    /**
     * Create a cookie that lasts "forever" (five years).
     *
     * @param  string  $name
     * @param  string  $value
     * @param  bool  $httpOnly
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    public function forever($name, $value, $httpOnly = true)
    {
        return $this->bake($name, $value, 2628000, $httpOnly);
    }

    /**
     * Expire the given cookie.
     *
     * @param  string  $name
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    public function forget($name)
    {
        return $this->bake($name, null, -2628000);
    }
}
