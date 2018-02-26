<?php

use Lib\Http\Request;

/**
 * All the API routes are defined here.
 */

route()->get('/api/products', function (Request $request) {
    return json(App\Models\Product::where([
        'category' => (int) $request->query('category'),
    ])->toArray());
});
