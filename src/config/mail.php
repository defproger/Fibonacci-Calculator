<?php

use App\Helpers\Env;

return [
    'host' => Env::get('MAIL_HOST', ''),
    'username' => Env::get('MAIL_USERNAME', ''),
    'password' => Env::get('MAIL_PASSWORD', ''),
    'address' => Env::get('MAIL_ADDRESS', ''),
    'addressName' => Env::get('MAIL_ADDRESS_NAME', ''),
    'companyName' => Env::get('MAIL_COMPANY_NAME', 'Fibonacci Calculator')
];