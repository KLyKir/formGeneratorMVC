<?php

namespace App\Controllers;

use App\Core\Application;
use App\Model\ContactModel;
use App\Core\Route;

class ContactController
{
    #[Route('GET', '/contact')]
    public function contact()
    {
        $response = ['status' => true];
        return Application::$app->view->render('contact', $response);
    }

    #[Router('POST', '/contactSave')]
    public function contactSave()
    {
        $response = ['status' => true];
        $data = Application::$app->request->getBody();

        $contactModel = new ContactModel();

        $contactModel->loadData($data);
        if ($contactModel->validate()) {
            $response = ['status' => false];
        }

        return Application::$app->view->render('contact', $response);
    }
}
