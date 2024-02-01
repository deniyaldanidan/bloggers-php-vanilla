<?php

namespace App;

use App\Controller\HomeController;

class Router
{
    protected $routes = [];

    public function addRoute(string $url, string $controller, string $action)
    {
        $this->routes[$url] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch($url)
    {
        if (array_key_exists($url, $this->routes)) {
            $controllerName = 'App\\Controller\\' . $this->routes[$url]['controller'];
            $action = $this->routes[$url]['action'];

            $controller = new $controllerName();
            $controller->$action();
        } else if ($url === "/" || $url === "") {
            $controller = new HomeController();
            $controller->index();
        } else {
            echo "Page: $url not found";
        }
    }
}

// add dynamic urls