<?php

namespace Lib\Support;

use Lib\Contracts\Support\Config as ConfigInterface;

class Config implements ConfigInterface
{
    /**
     * Reads the config files.
     *
     * @param  string  $path
     * @return mixed
     */
    public function read($path)
    {
        $path = explode('.', $path);

        foreach ($path as $index => $segment) {
            if ($index === 0) {
                $result = require base_path('config/').$segment.'.php';

                continue;
            }

            $result = $result[$segment];
        }

        return $result;
    }
}
