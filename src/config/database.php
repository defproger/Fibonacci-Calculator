<?php

use App\Helpers\Env;

return [
    'host' => Env::get('DB_HOST', 'db'),
    'port' => Env::get('DB_PORT', 3306),
    'dbname' => Env::get('DB_NAME', 'base'),
    'user' => Env::get('DB_USER', 'user'),
    'password' => Env::get('DB_PASSWORD', ''),
];