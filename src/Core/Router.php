<?php

namespace App\Core;

class Router
{
    public array $routes;

    public function __construct(
        public Request  $request,
        public Response $response,
        public View     $view
    ){}

    public function registerControllers(array $controllers)
    {
        foreach ($controllers as $controller) {
            $class = new \ReflectionClass($controller);
            $methods = $class->getMethods();
            foreach ($methods as $method) {
                $attributes = $method->getAttributes(Route::class, \ReflectionAttribute::IS_INSTANCEOF);
                foreach ($attributes as $attribute)
                {
                    //if($method->name != 'home' && $method->name != 'contact' && $method->name != 'contactSave'&& $method->name != 'contactSave'){dd($controller);}
                    $attributeInstance = $attribute->newInstance();
                    $this->addRoute(
                        $attributeInstance->method,
                        $attributeInstance->path,
                        [$controller, $method->getName()]
                    );
                }
            }
        }
    }


    public function addRoute(string $method, string $path, mixed $callback): void
    {
        $this->routes[$method][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();

        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $this->response->setCode(404);
            return $this->view->render('404');
        }

        if (is_string($callback)) {
            return $this->view->render($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }

        return call_user_func($callback);
    }
}
