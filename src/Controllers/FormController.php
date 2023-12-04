<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Route;
use App\Model\FormModel;

class FormController
{
    #[Route('GET', '/formGen')]
    public function formGen()
    {
        $response = ['status' => true];
        return Application::$app->view->render('formGen', $response);
    }

    #[Route('POST', '/generation')]
    public function generation(){
        $data = Application::$app->request->getBody();
        $formModel = new FormModel();

        $data = $formModel->loadData($data['form']);

        $response = ['status' => false];
        $response['formInfo'] = $data;
        return Application::$app->view->render('formGen', $response);
    }
}