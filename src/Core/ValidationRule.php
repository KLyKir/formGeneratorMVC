<?php

namespace App\Core;

class ValidationRule {
    public string $rule;
    public string $message;
    public ?int $length;

    public function __construct(string $rule, string $message = '', ?int $length = null) {
        $this->rule = $rule;
        $this->message = $message;
        $this->length = $length;
    }
}