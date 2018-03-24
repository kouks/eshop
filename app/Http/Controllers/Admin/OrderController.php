<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use Lib\Http\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Lib\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $products = [];

        foreach (Product::all() as $product) {
            $products[$product->slug] = $product;
        }

        return view('admin.orders.index', compact('orders', 'products'));
    }
}
