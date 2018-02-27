<?php

/**
 * All the API routes are defined here.
 */

route()->get('/api/products', function () {
    return json(App\Models\Product::all()->toArray());
});

route()->get('/api/products/{product}', function (App\Models\Product $product) {
    return json((array) $product);
});
