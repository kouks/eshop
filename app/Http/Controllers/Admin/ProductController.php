<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show a form for creating a new resource.
     *
     * @return \Lib\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->input('name'),
            'slug' => str_slug($request->input('name')),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
            'image' => $request->file('image')->store()
        ]);

        return redirect('/admin/products');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Lib\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function destroy(Request $request)
    {
        Product::delete([
            'slug' => $request->param('product'),
        ]);

        return redirect('/admin/products');
    }
}
