<?php

/*
 * Product API routes are defined here.
 */

route()->get('/api/products', 'Api\\ProductController@index');
route()->get('/api/products/count', 'Api\\ProductController@count')->middleware('admin');
route()->get('/api/products/{product}', 'Api\\ProductController@show');

/*
 * User API routes defined here.
 */

route()->get('/api/user', 'Api\\UserController@show')->middleware('auth');
route()->post('/api/user/update', 'Api\\UserController@update')->middleware('auth');
route()->get('/api/users/count', 'Api\\UserController@count')->middleware('admin');

/*
 * Order API routes defined here.
 */

route()->get('/api/orders', 'Api\\OrderController@index')->middleware('auth');
route()->post('/api/orders', 'Api\\OrderController@store');
route()->get('/api/orders/count', 'Api\\OrderController@count')->middleware('admin');
