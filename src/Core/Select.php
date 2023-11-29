<?php

namespace App\Core;

class Select extends AbstractElement implements Element
{
    public function __construct(string $id = " ", string $Name = "", array $options = [])
    {
        parent::__construct($id, $Name);
        $this->options = $options;
    }

    public function render()
    {
        $fullSelect = "<select id = '".$this->id."' name = '".$this->Name."'>";
        foreach ($this->options as $val) {
            $fullSelect .= $val->render();
        }
        $fullSelect = $fullSelect."</select>";
        return $fullSelect;
    }
}