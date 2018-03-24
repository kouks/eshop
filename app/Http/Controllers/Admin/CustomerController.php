<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
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
        $customers = User::where(['admin' => false]);

        return view('admin.customers.index', compact('customers'));
    }
}
