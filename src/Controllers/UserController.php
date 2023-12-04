<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Route;
use App\Model\UserModel;

class UserController
{
    #[Route('POST', '/userCheck')]
    public function userCheck()
    {
        $data = Application::$app->request->getBody();
        $userInfo = new UserModel($data);
        $errors = $userInfo->validate();
        $response = ['status' => true];
        $response['errors'] = $errors;
        return Application::$app->view->render('formGen', $response);
    }
}