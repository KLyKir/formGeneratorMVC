<?php

namespace App\Core;
class Input extends AbstractElement
{
    public function __construct(public string $id, public string $Name, public string $partInput = "") {
        parent::__construct($id, $Name);
        $this->partInput = "<input id = '".$id."' name = '".$Name."' type = ";
    }
}