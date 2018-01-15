<?php

namespace App\Http\Controllers;

use Lib\Http\Request;

class TestController
{
    public function asd(Request $request)
    {
        return view('test', [
            'asd' => 'asdadss',
        ]);
    }
}
