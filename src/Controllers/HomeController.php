<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Route;

class HomeController
{
    #[Route('GET', '/')]
    public function home()
    {
        return Application::$app->view->render('home');
    }
}
