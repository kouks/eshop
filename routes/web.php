<?php

use Lib\Http\Request;

/**
 * All the web routes are defined here.
 */

route()->get('/profile/{user}/orders/{order}', function (Request $request) {
    dd($request->param('order'));
    return view('about');
});

route()->get('/', function (Request $request) {
    return view('index');
});

route()->get('/about', function (Request $request) {
    return view('about');
});

route()->get('/login', function (Request $request) {
    return view('auth.index');
});

route()->get('/shop', function (Request $request) {
    return view('shop');
});
