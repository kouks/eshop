<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Lib\Http\Request;
use Lib\Http\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Lib\Http\Response
     */
    public function index()
    {
        $customers = User::all();

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\User  $user
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function update(User $user, Request $request)
    {
        User::update(['email' => $user->email], ['admin' => (bool) $request->input('admin')]);

        return redirect('/admin/customers');
    }
}
