<?php

namespace App\Exceptions;

use Exception;

class Handler extends \Lib\Exceptions\Handler
{
    /**
     * Renders the exception on the screen.
     *
     * @param  \Exception $e
     * @return void
     */
    public function render(Exception $e)
    {
        //

        parent::render($e);
    }
}
