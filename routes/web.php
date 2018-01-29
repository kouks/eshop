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


//admin
route()->get('/admin', function () {
    return view('admin.admin');
});


route()->get('/viewproducts', function () {
    return view('admin.viewproducts');
});

route()->get('/editproducts', function () {
    return view('admin.editproducts');
});

route()->get('/addproducts', function () {
    return view('admin.addproducts');
});


/**
 * Auth routes.
 */

route()->get('/login', 'AuthController@showLoginForm');
route()->get('/register', 'AuthController@showRegistrationForm');
