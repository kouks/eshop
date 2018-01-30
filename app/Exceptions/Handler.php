<?php

namespace App\Exceptions;

use Exception;
use Lib\Exceptions\Routing\RouteNotFoundException;

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
        if ($e instanceof RouteNotFoundException) {
            return view('errors.404');
        }

        parent::render($e);
    }
}
