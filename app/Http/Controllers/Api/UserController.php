<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Lib\Http\Request;
use Lib\Http\Controller;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Lib\Http\Response
     */
    public function show(Request $request)
    {
        return json($request->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Lib\Http\Request
     * @return \Lib\Http\Response
     */
    public function update(Request $request)
    {
        User::update(['api_token' => $request->user()->api_token], [
            'name' => $request->input('name'),
            'address' => [
                'street' => $request->input('address.street'),
                'city' => $request->input('address.city'),
                'country' => $request->input('address.country'),
                'postcode' => $request->input('address.postcode'),
            ],
            'phone' => $request->input('phone'),
        ]);

        return status(202);
    }

    /**
     * Return the count of the specified resource.
     *
     * @return \Lib\Http\Response
     */
    public function count()
    {
        $count = User::all()->count();

        return json(compact('count'));
    }
}
