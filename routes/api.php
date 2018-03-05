<?php

/*
 * All the API routes are defined here.
 */

route()->get('/api/products', 'Api\\ProductController@index');
route()->get('/api/products/count', 'Api\\ProductController@count')->middleware('admin');
route()->get('/api/products/{product}', 'Api\\ProductController@show');

/*
 * User API routes defined here.
 */

route()->get('/api/user', 'Api\\UserController@show');
route()->post('/api/user/update', 'Api\\UserController@update');
route()->get('/api/users/count', 'Api\\UserController@count')->middleware('admin');
