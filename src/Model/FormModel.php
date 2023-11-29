<?php

namespace App\Model;

class FormModel
{
    public function loadData( $data)
    {
        $data = json_decode($data);
        return $data;
    }

    public function validate( $data) {
        $data = str_replace(">", "&gt;", $data);
        $data = str_replace("<", "&lt;", $data);
        return $data;
    }

    public function createForm($formArr): string
    {
        $this->form = "<form>";
        foreach($formArr as $val) {
            if($val->element == 'select') {
                $optArr = array();
                foreach ($val->optionArr as $option){
                    $opt = new \App\Core\Option($option->value, $option->optionName);
                    array_push($optArr, $opt);
                }
                $element = new \App\Core\Select($val->id, $val->Name, $optArr);
            }
            else{
                $className = 'App\\Core\\' . $val->element;
                $element = new $className($val->id, $val->Name);
            }
            $this->form .= $element->render();
        }
        $this->form .= "</form>";
        return $this->form;
    }
}