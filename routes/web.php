<?php

use Lib\Http\Request;

/**
 * All the web routes are defined here.
 */

route()->get('/', function (Request $request) {
    return view('index');
});

route()->get('/about', function (Request $request) {
    return view('about');
});
