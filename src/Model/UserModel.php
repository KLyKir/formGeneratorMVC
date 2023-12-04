<?php

namespace App\Model;
use App\Core\Validate;

class UserModel
{
    #[Validate('Required', 'MinLength:2')]
    public $firstName;

    #[Validate('Required', 'MinLength:2')]
    public $lastName;

    #[Validate('Required', 'Email')]
    public $email;

    #[Validate('Required', 'MinLength:6', 'Password')]
    public $password;

    public function __construct(array $arr){
        $this->firstName = $arr['First_name'];
        $this->lastName = $arr['Last_Name'];
        $this->email = $arr['Email'];
        $this->password = $arr['Password'];
    }
    public function validate() {
        $errors = [];

        $reflection = new \ReflectionClass($this);

        foreach ($reflection->getProperties() as $property) {
            $propertyName = $property->getName();
            $attributes = $property->getAttributes(Validate::class);
            if (count($attributes) > 0) {
                $value = $this->$propertyName;
                //dd($attributes[0]->newInstance()->rules);
                foreach ($attributes[0]->newInstance()->rules as $rule) {
                    $methodName = 'validate' . $rule->rule;

                    if (!method_exists($this, $methodName) || !$this->$methodName($value, $rule->length)) {
                        $errors[$propertyName] = $rule->message;
                    }
                }
            }
        }

        return $errors;
    }

    private function validateRequired($value) {
        return !empty($value);
    }

    private function validateMinLength($value, $minLength) {
        return strlen($value) >= $minLength;
    }

    private function validateEmail($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    private function validatePassword($value) {
        return preg_match('/\d/', $value) && preg_match('/[a-zA-Z]/', $value);
    }
}