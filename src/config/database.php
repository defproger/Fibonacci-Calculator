<?php

use App\Helpers\Env;

return [
    'host' => Env::get('DB_HOST', 'localhost'),
    'port' => Env::get('DB_PORT', 3306),
    'dbname' => Env::get('DB_NAME', 'Fibonacci'),
    'user' => Env::get('DB_USER', 'root'),
    'password' => Env::get('DB_PASSWORD', ''),
];