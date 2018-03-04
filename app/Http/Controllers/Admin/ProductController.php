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
            'slug' => $this->generateSlug($request->input('name')),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
            'image' => $request->file('image')->store(),
        ]);

        return redirect('/admin/products');
    }

    /**
     * Show a form for editing a resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Lib\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Product  $product
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function update(Product $product, Request $request)
    {
        Product::update(['slug' => $product->slug], [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
        ]);

        return redirect('/admin/products');
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

    /**
     * Generates an unique slug for given base.
     *
     * @param  string  $base
     * @return string
     */
    public function generateSlug($base)
    {
        $temp = $base;

        for ($i = 2; Product::find(['slug' => $temp]) !== null; $i++) {
            $temp = $base.'-'.$i;
        }

        return $temp;
    }
}
