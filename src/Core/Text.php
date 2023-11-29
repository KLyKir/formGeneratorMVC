<?php

namespace App\Core;

class Text extends Input implements Element
{
    public function __construct(string $id, string $Name, string $Type = "text")
    {
        parent::__construct($id, $Name);
        $this->Type = $Type;
    }

    public function render(){
        return $this->partInput."'".$this->Type."' >";
    }
}