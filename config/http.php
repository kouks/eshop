<?php

return [

    'controllers' => '\\App\\Http\\Controllers',

    'middleware_names' => [
        'auth' => App\Http\Middleware\Authenticate::class,
        'admin' => App\Http\Middleware\Administrator::class,
    ],

    'global_middleware' => [
        //
    ],

];
