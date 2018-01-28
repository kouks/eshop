<?php

/**
 * All the web routes are defined here.
 */

route()->get('/', function () {
    return view('index', [
        'products' => [
            [
                'title' => 'Test',
                'subtitle' => 'asdasd',
                'image' => 'https://s7d2.scene7.com/is/image/ColumbiaSportswear2/10-31-16806-tops_3?$aem_jpeg$&scl=1',
            ],
            [
                'title' => 'Test2',
                'subtitle' => 'asdasd',
                'image' => 'https://s7d2.scene7.com/is/image/ColumbiaSportswear2/10-31-16806-tops_3?$aem_jpeg$&scl=1',
            ],
            [
                'title' => 'Test3',
                'subtitle' => 'asdasd',
                'image' => 'https://s7d2.scene7.com/is/image/ColumbiaSportswear2/10-31-16806-tops_3?$aem_jpeg$&scl=1',
            ],
            [
                'title' => 'Test4',
                'subtitle' => 'asdasd',
                'image' => 'https://s7d2.scene7.com/is/image/ColumbiaSportswear2/10-31-16806-tops_3?$aem_jpeg$&scl=1',
            ],
        ]
    ]);
});


route()->get('/shop', function () {
    return view('products.shop', [
        'products' => [
            [
                'title' => 'Test',
                'subtitle' => 'asdasd',
                'image' => 'https://s7d2.scene7.com/is/image/ColumbiaSportswear2/10-31-16806-tops_3?$aem_jpeg$&scl=1',
            ],
            [
                'title' => 'Test2',
                'subtitle' => 'asdasd',
                'image' => 'https://s7d2.scene7.com/is/image/ColumbiaSportswear2/10-31-16806-tops_3?$aem_jpeg$&scl=1',
            ],
            [
                'title' => 'Test3',
                'subtitle' => 'asdasd',
                'image' => 'https://s7d2.scene7.com/is/image/ColumbiaSportswear2/10-31-16806-tops_3?$aem_jpeg$&scl=1',
            ],
            [
                'title' => 'Test4',
                'subtitle' => 'asdasd',
                'image' => 'https://s7d2.scene7.com/is/image/ColumbiaSportswear2/10-31-16806-tops_3?$aem_jpeg$&scl=1',
            ],
        ]
    ] );
});

route()->get('/cart', function () {
    return view('cart');
});

route()->get('/contact', function () {
    return view('contact');
});

//pages for shop
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
 * Auth routes.
 */

route()->get('/login', 'AuthController@showLoginForm');
route()->get('/register', 'AuthController@showRegistrationForm');
