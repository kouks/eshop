<?php

return [
    'name' => 'Eshop',

    'providers' => [
        /**
         * Framework service providers.
         */
        Lib\Routing\RoutingServiceProvider::class,
        Lib\Templating\TemplatingServiceProvider::class,

        /**
         * App service providers.
         */
        \App\Providers\AppServiceProvider::class,

    ],
];
