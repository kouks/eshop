<?php

/*
 * Base web routes.
 */

route()->get('/', function () {
    return view('index');
});

route()->get('/contact', function () {
    return view('contact');
});

/*
 * Shopping routes.
 */

route()->get('/shop', 'ShopController@index');
route()->get('/products/{product}', 'ShopController@show');
route()->get('/cart', 'ShopController@cart');
route()->get('/checkout', 'ShopController@checkout');

/*
 * Profile routes.
 */

route()->get('/profile', function () {
    return view('profile.index');
})->middleware('auth');

/*
 * Administration routes.
 */

route()->get('/admin', function () {
    return view('admin.index');
})->middleware('admin');

route()->get('/admin/customers', 'Admin\\CustomerController@index')->middleware('admin');
route()->get('/admin/orders', 'Admin\\OrderController@index')->middleware('admin');
route()->get('/admin/products', 'Admin\\ProductController@index')->middleware('admin');
route()->get('/admin/products/create', 'Admin\\ProductController@create')->middleware('admin');
route()->post('/admin/products', 'Admin\\ProductController@store')->middleware('admin');
route()->get('/admin/products/{product}/edit', 'Admin\\ProductController@edit')->middleware('admin');
route()->post('/admin/products/{product}', 'Admin\\ProductController@update')->middleware('admin');
route()->get('/admin/products/{product}/delete', 'Admin\\ProductController@destroy')->middleware('admin');

/*
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
