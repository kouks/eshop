<?php

namespace App\Http\Controllers;

use App\Models\User;
use Lib\Http\Request;
use Lib\Http\Controller;

class AuthController extends Controller
{
    /**
     * Shows the login form page.
     *
     * @return \Lib\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Shows the registration form page.
     *
     * @return \Lib\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $passed = $request->validate([
            'name' => 'min:3'
        ]);

        if (! $passed) {
            return redirect('/login');
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => md5($request->input('password')),
        ]);

        return redirect('/shop');
    }
}
