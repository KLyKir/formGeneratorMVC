<?php

namespace App\Core;
class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public View $view;

    public static $app;

    public array $controllers;

    public function __construct()
    {
        self::$app = $this;
        $this->view = new View;
        $this->request = new Request;
        $this->response = new Response;
        $this->router = new Router(
            $this->request,
            $this->response,
            $this->view
        );
    }

    public function addRoute(string $method, string $path, mixed $callback): void
    {
        $this->router->addRoute($method, $path, $callback);
    }

    public function registerControllers( array $controllers){
        $this->router->registerControllers($controllers);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

}
