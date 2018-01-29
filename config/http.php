<?php

return [

    'controllers' => '\\App\\Http\\Controllers',

    'middleware_names' => [
        'auth' => App\Http\Middleware\Authenticate::class,
    ],

    'global_middleware' => [
        //
    ],

];
