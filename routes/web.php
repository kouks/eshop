<?php

/**
 * All the web routes are defined here.
 */

route()->get('/', function () {
    return view('index', ['products' => App\Models\Product::all()]);
});

route()->get('/cart', function () {
    return view('cart');
});

route()->get('/contact', function () {
    return view('contact');
});

/**
 * Shopping routes.
 */

route()->get('/shop', function () {
    return view('products.index');
});

route()->get('/products/{product}', function (Lib\Http\Request $request) {
    return view('products.show', [
        'slug' => $request->param('product')
    ]);
});

/**
 * Profile routes.
 */

route()->get('/profile', function () {
    return view('profile.index');
});

/**
 * Administration routes.
 */

route()->get('/admin', function () {
    return view('admin.index');
})->middleware('admin');

route()->get('/admin/products', 'Admin\\ProductController@index');
route()->get('/admin/products/create', 'Admin\\ProductController@create');
route()->post('/admin/products', 'Admin\\ProductController@store');
route()->get('/admin/products/{product}/delete', 'Admin\\ProductController@destroy');

/**
 * Auth routes.
 */

route()->get('/login', 'AuthController@showLoginForm');
route()->post('/login', 'AuthController@login');
route()->get('/register', 'AuthController@showRegistrationForm');
route()->post('/register', 'AuthController@register');
route()->get('/logout', 'AuthController@logout');

// testing zone
route()->get('/test', function () {
    return view('test');
});
