<?php

namespace Lib\Http\Concerns;

use Lib\Http\Validator;

trait ValidatesSelf
{
    /**
     * Boolean determining whether the request passed the validation.
     *
     * @var bool
     */
    public $passed = true;

    /**
     * The array of error messages.
     *
     * @var bool
     */
    public $errors = [];

    /**
     * Validates the request.
     *
     * @param  array|\Lib\Http\Validator  $restrictions
     * @param  array  $messages
     * @return bool
     */
    public function validate($restrictions, $messages = null)
    {
        if ($restrictions instanceof Validator) {
            $messages = $restrictions->messages();
            $restrictions = $restrictions->rules();
        }

        $rules = $this->readRulesFile();

        foreach ($restrictions as $field => $list) {
            $this->errors[$field] = $this->validateField($field, $list, $rules, $messages);
        }

        if (! $this->passed) {
            session()->flash('errors', $this->errors);
            session()->flash('old', $this->request->all());
        }

        return $this->passed;
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
            if (strpos($function, ':') > 0) {
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
