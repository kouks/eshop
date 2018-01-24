<?php

return [
    'name' => 'Eshop',

    'controllers' => '\\App\\Http\\Controllers',

    'providers' => [
        /**
         * Framework service providers.
         */
        Lib\Routing\RoutingServiceProvider::class,
        Lib\Templating\TemplatingServiceProvider::class,

        /**
         * Application service providers.
         */
        \App\Providers\AppServiceProvider::class,

    ],
];
