<?php

namespace Lib\Contracts\Exceptions;

use Exception;

interface Handler
{
    /**
     * Renders the exception on the screen.
     *
     * @param  \Exception $e
     * @return void
     *
     * @throws \Exception
     */
    public function render(Exception $e);
}
