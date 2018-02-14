<?php

return [

    /**
     * Validaton rules are defined here.
     */

    'min' => function ($value, $min) {
        return strlen($value) >= $min;
    },

    'max' => function ($value, $max) {
        return strlen($value) <= $max;
    },

    'required' => function ($value) {
        return ! empty($value);
    },

];
