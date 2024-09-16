<?php

use app\controllers\FibonacciController;
use app\services\View;
use app\routes\Router;

$router = new Router();

$router->get('/', function () {
    $view = new View();
    $view->display('index');
});

$router->get('/api/history', function () {
    $controller = new FibonacciController();
    $controller->getHistory();
});

$router->post('/api/fibonacci', function () {
    $controller = new FibonacciController();
    $controller->calculateFibonacci();
});

$router->resolve();