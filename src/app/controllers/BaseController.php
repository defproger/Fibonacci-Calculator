<?php

namespace app\controllers;

class BaseController
{
    /**
     * Метод для обработки запроса
     *
     * @param string $method HTTP метод (GET, POST, и т.д.)
     * @param string $url URL маршрут
     * @param callable $func Функция для обработки
     */
    public function request($method, $url, $func)
    {
        $pattern = str_replace('/', '\/', $url);
        $pattern = preg_replace('/<(\w+)>/', '(?P<$1>\w+)', $pattern);

        if ($_SERVER['REQUEST_METHOD'] === strtoupper($method) && preg_match('/^' . $pattern . '$/', $_SERVER['REQUEST_URI'], $matches)) {
            $func($matches);
        }
    }

    /**
     * Метод для отправки ответа
     *
     * @param mixed $data Данные для отправки в формате JSON
     * @param bool $errors Статус ошибок
     * @param int $code HTTP код
     */
    public function response($data = null, $errors = false, $code = 200)
    {
        http_response_code($code);
        echo json_encode($data ?? ['errors' => $errors]);
        exit();
    }
}