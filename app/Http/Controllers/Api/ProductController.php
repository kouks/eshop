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
        ];

        if ($request->query('query')) {
            $filters['name'] = new Regex($request->query('query'), 'i');
        }

        if ($request->query('orderby') && $request->query('orderdir')) {
            $options['sort'][$request->query('orderby')] = (int) $request->query('orderdir');
        }

        if ($request->query('categories')) {
            $filters['category'] = new Regex('('.$request->query('categories').')', 'i');
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

    /**
     * Return the count of the specified resource.
     *
     * @return \Lib\Http\Response
     */
    public function count()
    {
        $count = Product::all()->count();

        return json(compact('count'));
    }
}
