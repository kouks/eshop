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
    return view('cart');
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

route()->get('/shoes', function () {
    return view('products.categories.shoes');
});


/**
 * Administration routes.
 */

route()->get('/admin', function () {
    return view('admin.index');
});

route()->get('/admin/products', function () {
    return view('admin.products.index');
});

/**
 * Auth routes.
 */

route()->get('/login', 'AuthController@showLoginForm');
route()->get('/register', 'AuthController@showRegistrationForm');
