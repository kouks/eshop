<?php

/**
 * All the web routes are defined here.
 */

route()->get('/', function () {
    return view('index');
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

route()->get('/products/{product}', function () {
    return view('products.show');
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
});

route()->get('/admin/products', 'ProductController@index');
route()->get('/admin/products/create', 'ProductController@create');
route()->post('/admin/products', 'ProductController@store');

/**
 * Auth routes.
 */

route()->get('/login', 'AuthController@showLoginForm');
route()->get('/register', 'AuthController@showRegistrationForm');
route()->post('/register', 'AuthController@register');

