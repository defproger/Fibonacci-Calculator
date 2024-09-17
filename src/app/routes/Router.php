<?php

namespace app\routes;

class Router
{
    protected $routes = [];

    /**
     * Метод для обработки GET-запросов
     *
     * @param string $url
     * @param callable $func
     */
    public function get($url, $func)
    {
        $this->addRoute('GET', $url, $func);
    }

    /**
     * Метод для обработки POST-запросов
     *
     * @param string $url
     * @param callable $func )
     */
    public function post($url, $func)
    {
        $this->addRoute('POST', $url, $func);
    }

    /**
     * Метод для добавления маршрута в роутер
     *
     * @param string $method
     * @param string $url
     * @param callable $func
     */
    protected function addRoute($method, $url, $func)
    {
        $pattern = str_replace('/', '\/', $url);
        $pattern = preg_replace('/<(\w+)>/', '(?P<$1>\w+)', $pattern);
        $this->routes[] = [
            'method' => $method,
            'pattern' => '/^' . $pattern . '$/',
            'func' => $func
        ];
    }

    /**
     * Метод для обработки входящих запросов
     */
    public function resolve()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = $this->getCleanUri();

        foreach ($this->routes as $route) {
            if ($requestMethod === $route['method'] && preg_match($route['pattern'], $requestUri, $matches)) {
                return $route['func']($matches, $_GET, $_POST);
            }
        }

        http_response_code(404);
        echo json_encode(['error' => 'Route not found']);
        exit();
    }

    /**
     * Метод для очистки URI от GET-параметров
     *
     * @return string Чистый URI без GET-параметров
     */
    protected function getCleanUri()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = parse_url($uri, PHP_URL_PATH);
        return $uri;
    }
}