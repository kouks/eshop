<?php

namespace App\Http\Controllers;

use App\Models\User;
use Lib\Http\Request;
use Lib\Http\Controller;
use App\Http\Validators\LoginValidator;
use App\Http\Validators\RegistrationValidator;

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
     * Requests login with provided credentials.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function login(Request $request)
    {
        if (! $request->validate(new LoginValidator)) {
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

    /**
     * Attempts to register a user with provided credentials.
     *
     * @param  \Lib\Http\Request  $request
     * @return \Lib\Http\Response
     */
    public function register(Request $request)
    {
        if (! $request->validate(new RegistrationValidator)) {
            return redirect('/register');
        }

        if (User::find(['email' => $request->input('email'), 'shadow' => false])) {
            session()->flash('messages', ['danger' => 'This email is already in use.']);

            return redirect('/register');
        }

        if (User::find(['email' => $request->input('email'), 'shadow' => true])) {
            User::update(['email' => $request->input('email')], [
                'password' => md5($request->input('password')),
                'shadow' => false,
                'api_token' => $token = str_random(60),
            ]);

            return redirect('/shop')->withCookie(cookie()->bake('api_token', $token, 1440, false));
        }

       $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => md5($request->input('password')),
            'address' => ['street' => '', 'city' => '', 'country' => '', 'postcode' => ''],
            'phone' => '',
            'shadow' => false,
            'admin' => false,
            'api_token' => str_random(60),
        ]);

        return redirect('/shop')->withCookie(cookie()->bake('api_token', $user->api_token, 1440, false));
    }

    /**
     * Logs the user out.
     *
     * @return \Lib\Http\Response
     */
    public function logout()
    {
        return redirect('/')->withCookie(cookie()->forget('api_token'));
    }
}
