<?php

namespace app\controllers;

use app\services\Database;

class FibonacciController extends BaseController
{
    public function calculateFibonacci()
    {
        $username = $_POST['username'];
        $number = intval($_POST['number']);
        $ip = $_SERVER['REMOTE_ADDR'];

        if (empty($username) || $number < 0) {
            return $this->response(['error' => 'Invalid input'], true, 400);
        }

        $result = $this->fibonacci($number);

        $db = Database::getInstance();
        $db->insert('fibonacci_requests', [
            'username' => $username,
            'user_input' => $number,
            'fibonacci_number' => $result,
            'ip_address' => $ip
        ]);

        return $this->response([
            'fibonacci' => $result,
            'ip' => $ip
        ]);
    }

    private function fibonacci($n)
    {
        if ($n <= 1) return $n;
        return $this->fibonacci($n - 1) + $this->fibonacci($n - 2);
    }

    public function getHistory()
    {
        $db = Database::getInstance();
        $history = $db->queryAll("SELECT * FROM fibonacci_requests");

        return $this->response($history);
    }
}