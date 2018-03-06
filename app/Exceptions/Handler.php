<?php

namespace App\Exceptions;

use Exception;
use Lib\Http\Request;
use Lib\Exceptions\Routing\RouteNotFoundException;

class Handler extends \Lib\Exceptions\Handler
{
    /**
     * Renders the exception on the screen.
     *
     * @param  \Lib\Http\Request  $request
     * @param  \Exception  $e
     * @return void
     */
    public function render(Request $request, Exception $e)
    {
        if ($e instanceof RouteNotFoundException) {
            if ($request->wantsJson()) {
                return json(['error' => 'This endpoint was not found.'])->status(404);
            }

            return view('errors.404');
        }

        parent::render($request, $e);
    }
}
