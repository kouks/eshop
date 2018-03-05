<?php

namespace Lib\Contracts\Exceptions;

use Exception;
use Lib\Http\Request;

interface Handler
{
    /**
     * Renders the exception on the screen.
     *
     * @param  \Lib\Http\Request  $request
     * @param  \Exception  $e
     * @return void
     */
    public function render(Request $request, Exception $e);
}
