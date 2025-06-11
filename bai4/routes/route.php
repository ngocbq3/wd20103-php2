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
    return view('404');
});
// Run it!
$router->run();
