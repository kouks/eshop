<?php

namespace App\Http\Controllers;

use Lib\Http\Request;
use Lib\Http\Controller;

class ShopController extends Controller
{
    /**
     * Show the main shopping page.
     *
     * @return \Lib\Http\Response
     */
    public function index()
    {
        return view('shop.index');
    }

    /**
     * Show a single product page.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function show(Request $request)
    {
        $slug = $request->param('product');

        return view('shop.show', compact('slug'));
    }

    /**
     * Show the cart page.
     *
     * @return \Lib\Http\Response
     */
    public function cart()
    {
        return view('shop.cart');
    }

    /**
     * Show the checkout page.
     *
     * @return \Lib\Http\Response
     */
    public function checkout()
    {
        return view('shop.checkout');
    }
}
