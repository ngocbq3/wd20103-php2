<?php

require_once __DIR__ . '/../env.php';
require_once __DIR__ . "/../app/helper.php";

flash_next_request();
// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

require_once "web.php";
require_once "admin.php";

$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    echo "404 NOT FOUND";
});

// Run it!
$router->run();
