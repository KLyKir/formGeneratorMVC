<?php

namespace App\Core;

class Request
{
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getPath()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getBody()
    {
        return $_REQUEST;
    }

}
