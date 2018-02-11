<?php

use App\Models\User;
use App\Models\Product;
use Faker\Generator as Faker;

return [
    /**
     * Model factories are defined here.
     */

    User::class => function (Faker $faker) {
        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => md5('secret'),
            'address' => [
                'street' => $faker->streetAddress,
                'city' => $faker->city,
                'country' => $faker->country,
                'postcode' => $faker->postcode,
            ],
            'phone' => $faker->tollFreePhoneNumber,
            'shadow' => false,
            'admin' => false,
        ];
    },

    Product::class => function (Faker $faker) {
        return [
            'name' => $faker->sentence(2),
            'slug' => str_slug($faker->sentence(5)),
            'description' => $faker->paragraph(),
            'category' => ['Men', 'Women', 'Kids'][rand(0, 2)],
            'price' => rand(1000, 10000) / 100,
            'stock' => rand(0, 10),
            'image' => $faker->imageUrl(300, 300),
        ];
    },
];
