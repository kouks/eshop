<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Order;
use Lib\Http\Request;
use Lib\Http\Controller;
use Lib\Http\Kernel as Http;
use App\Http\Validators\OrderValidator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::where(['user' => $request->user()->email]);

        return json($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function store(Request $request)
    {
        if (! $request->validate(new OrderValidator)) {
            return json($request->errors)
                ->status(Http::UNPROCESSABLE_ENTITY);
        }

        $userData = $request->input('user');

        $user = User::find(['email' => $request->input('user')['email']]) ?? User::create([
            'name' => $userData['name'],
            'phone' => $userData['phone'],
            'email' => $userData['email'],
            'address' => [
                'street' => $userData['address']['street'] ?? '',
                'city' => $userData['address']['city'] ?? '',
                'country' => $userData['address']['country'] ?? '',
                'postcode' => $userData['address']['postcode'] ?? '',
            ],
            'shadow' => true,
            'admin' => false,
            'api_token' => '',
        ]);

        $order = Order::create([
            'id' => time(),
            'placed' => date('j. n. Y'),
            'status' => 'Placed',
            'user' => $user->email,
            'products' => $this->mapProducts($request->input('products')),
        ]);

        return json($order);
    }

    /**
     * Return the count of the specified resource.
     *
     * @return \Lib\Http\Response
     */
    public function count()
    {
        $count = Order::all()->count();

        return json(compact('count'));
    }

    /**
     * Parses products from request to be written to the database.
     *
     * @param  array  $products
     * @return array
     */
    private function mapProducts(array $products)
    {
        return array_map(function ($product) {
            return [
                'quantity' => $product['quantity'],
                'item' => $product['item']['slug'],
            ];
        }, $products);
    }
}
