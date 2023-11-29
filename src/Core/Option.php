<?php

namespace App\Core;

class Option implements Element
{
    public function __construct(string $value = " ", string $Name = "")
    {
        $this->value = $value;
        $this->Name = $value;
        if(str_contains($this->value,'"')){
            str_replace( $this->value, '"', '`');
        }
        if(str_contains($this->Name,'"')){
            str_replace( $this->Name, '"', '`');
        }
    }

    public function render()
    {
        return "<option value = '".$this->value."'>".$this->Name."</option>";
    }
}