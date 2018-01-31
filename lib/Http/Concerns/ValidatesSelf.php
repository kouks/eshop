<?php

namespace Lib\Http\Concerns;

trait ValidatesSelf
{
    /**
     * Validates the request, returning an array of error messages.
     *
     * @param  array  $restrictions
     * @param  array  $messages
     * @return array
     */
    public function validate($restrictions, $messages)
    {
        $rules = $this->readRulesFile();
        $errors = [];

        foreach ($restrictions as $field => $list) {
            $errors[$field] = $this->validateField($field, $list, $rules, $messages);
        }

        return $errors;
    }

    /**
     * Validates a single field.
     *
     * @param  string  $field
     * @param  array  $list
     * @param  array  $rules
     * @param  array  $messages
     * @return array
     */
    protected function validateField($field, $list, $rules, $messages)
    {
        $errors = [];

        foreach (explode('|', $list) as $function) {
            [$rule, $args] = explode(':', $function);

            if (! $rules[$rule]($this->input($field), ...explode(',', $args))) {
                $errors[] = $messages[$field.'.'.$rule];
            }
        }

        return $errors;
    }

    /**
     * Reads the rules file.
     *
     * @return array
     */
    protected function readRulesFile()
    {
        return require base_path('app').'/rules.php';
    }
}
