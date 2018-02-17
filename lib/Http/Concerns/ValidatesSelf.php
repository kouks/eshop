<?php

namespace Lib\Http\Concerns;

trait ValidatesSelf
{
    /**
     * Boolean determining whether the request passed the validation.
     *
     * @var bool
     */
    public $passed = true;

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
            if (strpos(':', $function) > 0) {
                [$rule, $args] = explode(':', $function);
            } else {
                $rule = $function;
                $args = '';
            }

            if (! $rules[$rule]($this, $field, ...explode(',', $args))) {
                $errors[] = $messages[$field.'.'.$rule];

                $this->passed = false;
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
