<?php

return [

    /*
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

    'same' => function ($request, $field, $confirmation) {
        return $request->input($field) === $request->input($confirmation);
    },

    'email' => function ($request, $field) {
        return true;
    },

    'has' => function ($request, $field, ...$keys) {
        foreach ($keys as $key) {
            if (
                ! array_key_exists($key, $request->input($field))
                || empty($request->input($field)[$key])
            ) {
                return false;
            }
        }

        return true;
    },

    'each_exist' => function ($request, $field, $model, $key) {
        foreach ($request->input($field) as $item) {
            if ($model::find([$key => $item['item'][$key]]) === null) {
                return false;
            }
        }

        return true;
    },

    'image' => function ($request, $field) {
        $file = $request->files->get($field);

        return $file && in_array(
            strtolower($file->guessClientExtension()),
            ['png', 'jpg', 'jpeg']
        );
    },

];
