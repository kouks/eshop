<?php

namespace Lib\Exceptions;

use Exception;
use Lib\Contracts\Exceptions\Handler as HandlerContract;

class Handler implements HandlerContract
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
