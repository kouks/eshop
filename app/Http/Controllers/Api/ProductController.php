<?php

namespace App\Http\Controllers\Api;

use Lib\Http\Request;
use App\Models\Product;
use Lib\Http\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Lib\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return json($products->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Lib\Http\Response
     */
    public function show(Product $product)
    {
        return json($product->toArray());
    }
}
