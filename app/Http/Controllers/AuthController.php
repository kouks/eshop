<?php

namespace App\Http\Controllers;

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
}
