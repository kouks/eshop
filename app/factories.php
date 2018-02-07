<?php

use App\Models\User;

return [
    /**
     * Model factories are defined here.
     */

    User::class => [
        'name' => $faker->name,
    ]
];
