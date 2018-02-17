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

    /**
     * Requetss login with provided credentials.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function login(Request $request)
    {
        $errors = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'The email field is required.',
            'password.required' => 'The email field is required.',
        ]);

        if (! $request->passed) {
            session()->flash('errors', $errors);

            return redirect('/login');
        }

        $user = User::find([
            'email' => $request->input('email'),
            'password' => md5($request->input('password')),
        ]);

        if (is_null($user)) {
            session()->flash('messages', ['danger' => 'The credentials are incorrect.']);

            return redirect('/login');
        }

        return redirect('/shop')->withCookie(cookie()->bake('api_token', $user->api_token, 1440, false));
    }

    public function register(Request $request)
    {
        // $passed = $request->validate([
        //     'name' => 'min:3'
        // ]);

        // if (! $passed) {
        //     return redirect('/login');
        // }

        User::create($user = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => md5($request->input('password')),
            'api_token' => str_random(60),
        ]);

        return redirect('/shop')->withCookie(cookie()->bake('api_token', $user['api_token'], 1440, false));
    }
}
