<?php

use App\Controllers\Admin\ProductController;

//Nhóm đường dẫn
$router->mount('/admin', function () use ($router) {
    $router->mount('/products', function () use ($router) {

        $router->get('/',         ProductController::class . "@index");
        $router->get('/create',  ProductController::class . "@create");
        $router->post('/create',  ProductController::class . "@store");
        $router->post('/{id}',  ProductController::class . "@destroy");
    });
});
