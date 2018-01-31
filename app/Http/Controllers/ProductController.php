<?php

namespace App\Http\Controllers;

use Lib\Http\Request;
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
        return view('admin.products.index');
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
     * @return \Lib\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->validate([
            'name' => 'min:3|max:7'
        ], [
            'name.min' => 'Min 3',
            'name.max' => 'Max 7',
        ]));

        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @return \Lib\Http\Response
     */
    public function show()
    {
        //
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
     * @return \Lib\Http\Response
     */
    public function destroy()
    {
        //
    }
}
