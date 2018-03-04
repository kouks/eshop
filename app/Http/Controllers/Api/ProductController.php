<?php

namespace App\Http\Controllers\Api;

use Lib\Http\Request;
use App\Models\Product;
use Lib\Http\Controller;

class ProductController extends Controller
{
    /**
     * Number of product to be show per page.
     *
     * @var int
     */
    protected $perPage = 9;

    /**
     * Display a listing of the resource.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginated($request->query('page'), $this->perPage);

        return json($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Lib\Http\Response
     */
    public function show(Product $product)
    {
        return json($product);
    }
}
