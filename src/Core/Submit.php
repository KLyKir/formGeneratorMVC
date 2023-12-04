<?php

namespace App\Core;

class Submit extends Input implements Element
{
    public function __construct(string $id, string $Name, string $Type = "submit")
    {
        parent::__construct($id, $Name);
        $this->Type = $Type;
    }

    public function render(){
        return $this->partInput."'".$this->Type."' >";
    }
}