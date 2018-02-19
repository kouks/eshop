<?php

namespace App\Http\Validators;

use Lib\Http\Validator;

class RegistrationValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6|same:password_confirmation',
        ];
    }

    /**
     * Return the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.min' => 'The name field needs to be at least 3 characters long.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email needs to be a valid email',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password field needs to be at least 6 characters long.',
            'password.same' => 'The passwords need to match.',
        ];
    }
}
