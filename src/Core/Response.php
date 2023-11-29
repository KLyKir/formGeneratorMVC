<?php

namespace App\Core;

class Response
{
    public function setCode(int $code)
    {
        return http_response_code($code);
    }
}
