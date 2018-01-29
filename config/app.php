<?php

return [
    'name' => 'h&p&mdash;The online store.',

    'controllers' => '\\App\\Http\\Controllers',

    'providers' => [
        /**
         * Framework service providers.
         */
        Lib\Database\DatabaseServiceProvider::class,
        Lib\Routing\RoutingServiceProvider::class,
        Lib\Templating\TemplatingServiceProvider::class,

        /**
         * Application service providers.
         */
        \App\Providers\AppServiceProvider::class,

    ],
];
