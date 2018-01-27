<?php

namespace Lib\Contracts\Exceptions;

use Exception;

interface Handler
{
    /**
     * Renders the exception on the screen.
     *
     * @param  \Exception $e
     * @return \Lib\Http\Response
     *
     * @throws \Exception
     */
    public function render(Exception $e);
}
