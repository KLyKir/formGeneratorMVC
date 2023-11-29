<?php

namespace App\Core;

abstract class AbstractElement
{
    public function __construct(
        public string $id = " ", public string $Name = ""
    ){
        if(str_contains($this->id,'"')){
            str_replace( $this->id, '"', '`');
        }
        if(str_contains($this->Name,'"')){
            str_replace( $this->Name, '"', '`');
        }
    }
}