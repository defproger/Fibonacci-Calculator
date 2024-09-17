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
        $username = $post['username'];
        $number = intval($post['number']);
        $ip = $_SERVER['REMOTE_ADDR'];

        if (empty($username) || $number < 0) {
            return $this->response(['error' => 'Invalid input'], true, 400);
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
        $start = +$params['start'] ?? 0;
        $length = +$params['length'] ?? 10;
        $searchValue = $params['search']['value'] ?? '';

        $orderColumnIndex = $params['order'][0]['column'] ?? 0;
        $orderDirection = in_array($params['order'][0]['dir'], ['asc', 'desc']) ? $params['order'][0]['dir'] : 'desc';

        $columns = ['id', 'username', 'user_input', 'fibonacci_number'];
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