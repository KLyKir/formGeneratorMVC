<?php

namespace App\Core;

class Radiobutton extends Input implements Element
{
    public function __construct(string $id, string $Name, string $Type = "radiobutton")
    {
        parent::__construct($id, $Name);
        $this->Type = $Type;
    }

    public function render(){
        return $this->partInput."'".$this->Type."' >";
    }
}