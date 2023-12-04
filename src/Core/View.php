<?php

namespace App\Core;

class View
{
    private const VIEW_PATH = __DIR__ . "/../views/";

    public function render(string $callback, array $params = []): bool|string
    {
        $layout = $this->renderLayout();
        $view = $this->renderView($callback, $params);
        return str_replace('{{view}}', $view, $layout);
    }

    private function renderView(string $callback, array $params = []): bool|string
    {
        foreach ($params as $keyParam => $paramValue) {
            if($keyParam == 'formInfo'){
                $paramValue = $this->createForm($paramValue);
            }
            if($keyParam == 'errors'){
                $paramValue = $this->getInfoFromErrors($paramValue);
            }
            $$keyParam = $paramValue;
        }
        if(!isset($params['errors'])){
            $params['errors'] = '';
            //dd($params);
        }
        ob_start();
        include_once self::VIEW_PATH . "{$callback}.php";
        return ob_get_clean();
    }

    private function renderLayout(): bool|string
    {
        ob_start();
        include_once self::VIEW_PATH . "layout.php";
        return ob_get_clean();
    }

    public function createForm($formArr): string
    {
        $this->form = "<form action='/userCheck' method = 'POST' id = 'userInfo' name = 'userInfo'>";
        foreach($formArr as $val) {
            if($val->element == 'select') {
                $optArr = array();
                foreach ($val->optionArr as $option){
                    $opt = new \App\Core\Option($option->value, $option->optionName);
                    array_push($optArr, $opt);
                }
                $element = new \App\Core\Select($val->id, $val->name, $optArr);
            }
            else{
                $className = 'App\\Core\\' . $val->element;
                $element = new $className($val->id, $val->name);
            }
            $this->form .= "<p>".$val->name."</p>";
            $this->form .= $element->render();
        }
        $this->form .= "</form>";
        return $this->form;
    }
    private function getInfoFromErrors(array $err){
        //dd($err);
        $error = '';
        foreach ($err as $key => $e){
            if(is_numeric($e)){
                $error .= $key. " must be more than ".$e. "<br>";
            }
            if($e == ''){
                $error .= "Problem with ".$key. "<br>";
                if($key == 'email'){
                    $error .= "Must be type of email<br>";
                }else{
                    if($key == 'password'){
                        $error .= "Must have letters and numbers<br>";
                    }
                    else{
                        $error .= $key. "is required field";
                    }
                }

            }
        }
        return $error;
    }
}
