<?php

namespace Lib\Contracts\Http;

use Lib\Http\Request;

interface Kernel
{
    /**
     * Handles the incoming request and generates a reponse.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function handle(Request $request);
}
