<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \App\Controllers\HomeController;
use \App\Core\Application;
use \App\Controllers\ContactController;
use \App\Controllers\FormController;
use \App\Controllers\UserController;

$app = new Application();
$app->registerControllers([
    HomeController::class,
    ContactController::class,
    FormController::class,
    UserController::class
]);
//$app->addRoute('GET', '/', [HomeController::class, 'home']);
//
//$app->addRoute('GET', '/contact', [ContactController::class, 'contact']);
//
//$app->addRoute('GET', '/formGen', [FormController::class, 'formGen']);
//
//$app->addRoute('POST', '/generation', [FormController::class, 'generation']);


$app->run();
