<?php

namespace app\controllers;

use app\services\Database;

class FibonacciController extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function calculateFibonacci($post)
    {
        if (!isset($post['username']) || !is_string($post['username']) || strlen($post['username']) < 3 || strlen($post['username']) > 20) {
            $this->response(['error' => 'Invalid username. It must be a string between 3 and 20 characters.'], true, 400);
        }

        $username = htmlspecialchars(trim($post['username']), ENT_QUOTES, 'UTF-8');

        if (!isset($post['number']) || !is_numeric($post['number']) || intval($post['number']) < 0 || intval($post['number']) > 1000) {
            $this->response(['error' => 'Invalid number. Please provide a number between 0 and 1000.'], true, 400);
        }

        $number = intval($post['number']);

        $ip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);

        if (!$ip) {
            $this->response(['error' => 'Could not determine your IP address.'], true, 500);
        }

        if ($number > 1476) {
            return $this->response(['error' => 'Number is too large'], true, 400);
        }

        $result = $this->fibonacci($number);

        $this->db->insert('fibonacci_requests', [
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

        $matrix = [[1, 1], [1, 0]];
        $result = $this->matrixPower($matrix, $n - 1);
        return $result[0][0];
    }

    private function matrixPower($matrix, $n)
    {
        $result = [[1, 0], [0, 1]];
        while ($n > 0) {
            if ($n % 2 != 0) {
                $result = $this->matrixMultiply($result, $matrix);
            }
            $matrix = $this->matrixMultiply($matrix, $matrix);
            $n = intdiv($n, 2);
        }
        return $result;
    }

    private function matrixMultiply($a, $b)
    {
        return [
            [
                $a[0][0] * $b[0][0] + $a[0][1] * $b[1][0],
                $a[0][0] * $b[0][1] + $a[0][1] * $b[1][1]
            ],
            [
                $a[1][0] * $b[0][0] + $a[1][1] * $b[1][0],
                $a[1][0] * $b[0][1] + $a[1][1] * $b[1][1]
            ]
        ];
    }

    public function getHistory($params)
    {
        $columns = ['id', 'username', 'user_input', 'fibonacci_number'];

        $start = isset($params['start']) && is_numeric($params['start']) ? max(0, (int)$params['start']) : 0;
        $length = isset($params['length']) && is_numeric($params['length']) && (int)$params['length'] > 0 ? min(100, (int)$params['length']) : 10;

        $searchValue = isset($params['search']['value']) ? htmlspecialchars(trim($params['search']['value']), ENT_QUOTES, 'UTF-8') : '';

        $orderColumnIndex = isset($params['order'][0]['column']) && is_numeric($params['order'][0]['column']) && (int)$params['order'][0]['column'] >= 0 && (int)$params['order'][0]['column'] < count($columns)
            ? (int)$params['order'][0]['column']
            : 0;

        $orderDirection = isset($params['order'][0]['dir']) && in_array(strtolower($params['order'][0]['dir']), ['asc', 'desc'])
            ? strtolower($params['order'][0]['dir'])
            : 'desc';

        $orderBy = $columns[$orderColumnIndex] ?? 'id';


        $query = "SELECT * FROM fibonacci_requests 
              WHERE username LIKE :search 
              OR user_input LIKE :search 
              OR fibonacci_number LIKE :search
              ORDER BY $orderBy $orderDirection 
              LIMIT $start, $length";

        $data = $this->db->queryAll($query, [
            'search' => "%$searchValue%",
        ]);

        $totalQuery = "SELECT COUNT(*) as total FROM fibonacci_requests";
        $total = $this->db->query($totalQuery)['total'];

        if ($searchValue != '') {
            $searchCount = "SELECT COUNT(*) as total FROM fibonacci_requests
                        WHERE username LIKE :search 
                        OR user_input LIKE :search 
                        OR fibonacci_number LIKE :search";
            $recordsFiltered = $this->db->query($searchCount, [
                'search' => "%$searchValue%"
            ])['total'];
        } else {
            $recordsFiltered = $total;
        }

        $response = [
            'draw' => $params['draw'] ?? 1,
            'recordsTotal' => $total,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ];

        $this->response($response);
    }
}