<?php

namespace App\Controllers;

use App\Core\Application;

class HomeController
{
    public function home()
    {
        return Application::$app->view->render('home');
    }
}
