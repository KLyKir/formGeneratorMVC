<?php

namespace App\Core;

class Button extends AbstractElement implements Element
{
    public function __construct(string $id = " ", string $Name = "")
    {
        parent::__construct($id, $Name);
    }

    public function render()
    {
        return "<button id = '" . $this->id . "'>" . $this->Name . "</button>";
    }
}