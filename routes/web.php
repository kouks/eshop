<?php

/**
 * All the web routes are defined here.
 */

route()->get('/', function () {
    return view('index');
});

route()->get('/shop', function () {
    return view('products.shop');
});

route()->get('/cart', function () {
    return view('cart.cart');
});

route()->get('/contact', function () {
    return view('contact');
});

/**
 * Shopping routes.
 */

route()->get('/men', function () {
    return view('products.categories.men');
});

route()->get('/women', function () {
    return view('products.categories.women');
});

route()->get('/kids', function () {
    return view('products.categories.kids');
});

/**
 * Profile routes.
 */

route()->get('/profile', function () {
    return view('profile');
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
