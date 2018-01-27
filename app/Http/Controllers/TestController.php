<?php

namespace App\Http\Controllers;

use Lib\Http\Request;

class TestController
{
    public function test()
    {
        return redirect('/about');
    }
}
