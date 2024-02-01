<?php

require_once __DIR__ . "/vendor/autoload.php";

/*
use App\Controller\HomeController;

$controller = new HomeController();
echo $controller->index();
*/

use App\Router;

$router = new Router();

$router->addRoute("/", 'HomeController', "index");
$router->addRoute("/create-blog", "BlogController", "create");
$router->addRoute("/post-blog", "BlogController", "post");

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = rtrim($requestUri, '/');

$router->dispatch($url);
