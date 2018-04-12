<?php

return [
    'name' => [
        'shop' => 'h&p—The online store.',
        'admin' => 'h&p—Admin panel.',
    ],

    'controllers' => '\\App\\Http\\Controllers',

    'providers' => [
        /*
         * Framework service providers.
         */
        Lib\Auth\AuthServiceProvider::class,
        Lib\Cookies\CookieServiceProvider::class,
        Lib\Database\DatabaseServiceProvider::class,
        Lib\Routing\RoutingServiceProvider::class,
        Lib\Session\SessionServiceProvider::class,
        Lib\Templating\TemplatingServiceProvider::class,

        /*
         * Application service providers.
         */
        \App\Providers\AppServiceProvider::class,

    ],
];
