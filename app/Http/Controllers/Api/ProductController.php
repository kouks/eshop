<?php

namespace App\Http\Controllers\Api;

use Lib\Http\Request;
use App\Models\Product;
use MongoDB\BSON\Regex;
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
        $filters = [];
        $page = $request->query('page') ?? 1;

        $options = [
            'limit' => $this->perPage,
            'skip' => ($page - 1) * $this->perPage,
            'sort' => ['views' => -1],
        ];

        if ($query = $request->query('query')) {
            $filters['name'] = new Regex($query, 'i');
        }

        $products = Product::where($filters, $options);

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
