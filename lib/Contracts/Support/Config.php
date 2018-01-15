<?php

namespace Lib\Contracts\Support;

interface Config
{
    /**
     * Reads the config files.
     *
     * @param  string  $path
     * @return mixed
     */
    public function read($path);
}
