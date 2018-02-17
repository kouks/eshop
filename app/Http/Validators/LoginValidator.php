<?php

namespace App\Http\Validators;

use Lib\Http\Validator;

class LoginValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
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
            'email.required' => 'The email field is required.',
            'password.required' => 'The email field is required.',
        ];
    }
}
