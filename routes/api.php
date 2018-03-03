<?php

use App\Models\User;
use Lib\Http\Request;
use App\Models\Product;

/**
 * All the API routes are defined here.
 */

route()->get('/api/products', function () {
    return json(Product::all()->toArray());
});

route()->get('/api/products/{product}', function (Product $product) {
    return json((array) $product);
});

route()->get('/user', function (Request $request) {
    return json((array) $request->user());
});

route()->post('/user/edit', function (Request $request) {
    User::update(['api_token' => $request->user()->api_token], [
        'name' => $request->input('name'),
        'address' => [
            'street' => $request->input('address.street'),
            'city' => $request->input('address.city'),
            'country' => $request->input('address.country'),
            'postcode' => $request->input('address.postcode')
        ],
        'phone' => $request->input('phone'),
    ]);

    return json([])->status(202);
});
