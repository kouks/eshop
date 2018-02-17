<?php

return [

    /**
     * Validaton rules are defined here.
     */

    'min' => function ($request, $field, $min) {
        return strlen($request->input($field)) >= $min;
    },

    'max' => function ($request, $field, $max) {
        return strlen($request->input($field)) <= $max;
    },

    'required' => function ($request, $field) {
        return ! empty($request->input($field));
    },

];
