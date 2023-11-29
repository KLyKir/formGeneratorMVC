<?php

namespace App\Model;

class ContactModel
{
    public $email;
    public $full_name;


    public function loadData(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {
        if (!$this->email) {
            throw new \Exception('Email not initialized');
        }

        if (!$this->full_name) {
            throw new \Exception('Full NAme not initialized');
        }

        return true;
    }
}
