<?php

namespace Lib\Http;

abstract class Validator
{
    /**
     * Return the validation rules.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * Return the validation messages.
     *
     * @return array
     */
    abstract public function messages();
}
