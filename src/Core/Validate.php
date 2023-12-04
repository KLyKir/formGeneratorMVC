<?php

namespace App\Core;
use App\Core\ValidationRule;

#[\Attribute]
class Validate {
    public array $rules;

    public function __construct(string ...$rules) {
        $this->rules = array_map(function ($rule) {
            $ruleParts = explode(':', $rule, 2);
            $message = isset($ruleParts[1]) ? $ruleParts[1] : '';

            if ($ruleParts[0] === 'MinLength') {
                return new ValidationRule($ruleParts[0], $message, (int)$ruleParts[1]);
            } else {
                return new ValidationRule($ruleParts[0], $message);
            }
        }, $rules);
    }
}