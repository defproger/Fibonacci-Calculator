<?php

use app\services\View;
use app\routes\Router;

use app\controllers\FibonacciController;

$router = new Router();

$router->get('/', function () {
    $view = new View();
    $view->display('index');
});

$router->get('/api/history', function ($matches, $get) {
    $controller = new FibonacciController();
    $controller->getHistory($get);
});

$router->post('/api/fibonacci', function ($matches, $get, $post) {
    $controller = new FibonacciController();
    $controller->calculateFibonacci($post);
});

$router->resolve();