<?php

use App\Controllers\HomeController;
use App\Controllers\ProductController;

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

//Chi tiết sản phẩm
$router->get('/product/{id}', HomeController::class . '@show');

$router->get('/show-all', HomeController::class . '@showAll');

$router->get('/products', ProductController::class . "@index");
$router->get('/products/store', ProductController::class . "@store");
$router->get('/products/update', ProductController::class . "@update");
$router->get('/products/delete', ProductController::class . "@destroy");
// Run it!
$router->run();
