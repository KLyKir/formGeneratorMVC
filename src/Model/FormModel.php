<?php

namespace App\Model;

class FormModel
{
    public function loadData( $data)
    {
        $data = json_decode($data);
        return $data;
    }
}