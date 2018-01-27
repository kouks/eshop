<?php

return [
    'mongodb' => [
        'uri' => env('DATABASE_URI', 'mongodb://127.0.0.1/'),
        'collection' => env('DATABASE_NAME'),
    ],
];
