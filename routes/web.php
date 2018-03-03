<?php

/**
 * Base web routes.
 */

route()->get('/', function () {
    return view('index');
});

route()->get('/contact', function () {
    return view('contact');
});

/**
 * Shopping routes.
 */

route()->get('/shop', 'ShopController@index');
route()->get('/products/{product}', 'ShopController@show');
route()->get('/cart', 'ShopController@cart');
route()->get('/checkout', 'ShopController@checkout');

/**
 * Profile routes.
 */

route()->get('/profile', function () {
    return view('profile.index');
})->middleware('auth');

/**
 * Administration routes.
 */

route()->get('/admin', function () {
    return view('admin.index');
});

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
