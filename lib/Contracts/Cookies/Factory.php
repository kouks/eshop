<?php

namespace Lib\Contracts\Cookies;

interface Factory
{
    /**
     * Create a new cookie instance.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  int  $minutes
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    public function bake($name, $value, $minutes = 0);

    /**
     * Create a cookie that lasts "forever" (five years).
     *
     * @param  string  $name
     * @param  string  $value
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    public function forever($name, $value);

    /**
     * Expire the given cookie.
     *
     * @param  string  $name
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    public function forget($name);
}
