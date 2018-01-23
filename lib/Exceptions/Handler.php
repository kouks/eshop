<?php

namespace Lib\Exceptions;

use Exception;

class Handler
{
    /**
     * Renders the exception on the screen.
     *
     * @param  \Exception $e
     * @return void
     *
     * @throws \Exception
     */
    public function render(Exception $e)
    {
        // We just rethrow the exception if unhandled by the applcation,
        // passing it to the Whoops library.
        throw $e;
    }
}
