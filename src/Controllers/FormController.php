<?php

namespace App\Controllers;
use App\Core\Application;
use App\Model\FormModel;

class FormController
{
    public function formGen()
    {
        $response = ['status' => true];
        return Application::$app->view->render('formGen', $response);
    }

    public function generation(){
        $data = Application::$app->request->getBody();

        $formModel = new FormModel();

        $data = $formModel->loadData($data['form']);
        $info = $formModel->validate($formModel->createForm($data));
        $response = ['status' => false];
        $response['formInfo'] = $info;
        return Application::$app->view->render('formGen', $response);
    }
}