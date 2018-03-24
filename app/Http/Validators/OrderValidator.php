<?php

namespace App\Http\Validators;

use Lib\Http\Validator;

class OrderValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user' => 'required|has:email,name,phone,address',
            'products' => 'required|each_exist:\\App\\Models\\Product,slug',
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
            'user.required' => 'You are missing some personal data.',
            'user.has' => 'You are missing some personal data.',
            'products.required' => 'You cannot buy nothing.',
            'products.each_exist' => 'There is a faulty product in your cart.',
        ];
    }
}
