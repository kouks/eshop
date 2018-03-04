<?php

/**
 * All the API routes are defined here.
 */

route()->get('/api/products', 'Api\\ProductController@index');
route()->get('/api/products/{product}', 'Api\\ProductController@show');

/**
 * User API routes defined here.
 */

route()->get('/user', 'Api\\UserController@show');
route()->post('/user/update', 'Api\\UserController@update');
