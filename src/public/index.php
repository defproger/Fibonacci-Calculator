<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/helpers/Env.php';
require_once __DIR__ . '/../app/helpers/Config.php';
require_once __DIR__ . '/../app/services/Database.php';
require_once __DIR__ . '/../app/services/View.php';
require_once __DIR__ . '/../app/controllers/BaseController.php';
require_once __DIR__ . '/../app/controllers/FibonacciController.php';
require_once __DIR__ . '/../app/routes/Router.php';
require_once __DIR__ . '/../app/routes/web.php';
