<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;

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


$router->mount('/auth', function () use ($router) {
    $router->get('/login', AuthController::class . "@login");
    $router->post('/login', AuthController::class . "@postLogin");
    $router->get('/register', AuthController::class . "@register");
    $router->post('/register', AuthController::class . "@postRegister");

    $router->get('/logout', AuthController::class . "@logout");
});
