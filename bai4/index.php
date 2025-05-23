<?php
require_once __DIR__ . '/env.php';
require_once __DIR__ . "/app/helper.php";

// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
$router->get('/', 'App\Controllers\HomeController@index');

$router->get('/about', function () {
    echo "ABOUT PAGE";
});
$router->get('/contact', function () {
    echo "CONTACT PAGE";
});

//Sử dụng tham số
$router->get('/posts/{id}', function ($id) {
    echo "Post Id=$id";
});

// Run it!
$router->run();
