<?php

use Lib\Http\Request;

/**
 * All the web routes are defined here.
 */

route()->get('/profile/{user}/orders/{order}', function (Request $request) {
    dd($request->param('order'));
    return view('about');
});

route()->get('/', function (Request $request) {
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

route()->get('/about', function (Request $request) {
    return view('about');
});

route()->get('/login', function (Request $request) {
    return view('auth.index');
});

route()->get('/shop', function (Request $request) {
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

route()->get('/register', function (Request $request) {
    return view('auth.register');
});

route()->get('/cart', function (Request $request) {
    return view('cart');
});

route()->get('/contact', function (Request $request) {
    return view('contact');
});


//pages for shop
route()->get('/men', function (Request $request) {
    return view('products.categories.men');
});

route()->get('/women', function (Request $request) {
    return view('products.categories.women');
});

route()->get('/kids', function (Request $request) {
    return view('products.categories.kids');
});

route()->get('/shoes', function (Request $request) {
    return view('products.categories.shoes');
});

