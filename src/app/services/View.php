<?php

namespace app\services;

class View
{
    /**
     * Метод для рендеринга представления.
     *
     * @param string $template Имя файла шаблона (без расширения .php)
     * @param array $data Массив данных для передачи в шаблон
     */
    public function render($template, $data = [])
    {
        $templatePath = __DIR__ . '/../../views/' . $template . '.php';

        if (!file_exists($templatePath)) {
            throw new \Exception("View template {$template} not found.");
        }

        extract($data);

        ob_start();
        include $templatePath;
        return ob_get_clean();
    }

    /**
     * Метод для прямого отображения шаблона с выводом данных
     *
     * @param string $template Имя файла шаблона
     * @param array $data Данные для передачи
     */
    public function display($template, $data = [])
    {
        echo $this->render($template, $data);
    }
}