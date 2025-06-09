<?php

use App\Controllers\Admin\ProductController;

//Nhóm đường dẫn
$router->mount('/admin', function () use ($router) {
    $router->mount('/products', function () use ($router) {

        $router->get('/',         ProductController::class . "@index");
        $router->get('/create',  ProductController::class . "@create");
        $router->post('/create',  ProductController::class . "@store");
        $router->post('/delete/{id}',  ProductController::class . "@destroy");

        //From edit
        $router->get('/edit/{id}', ProductController::class . "@edit");
        $router->post('/edit/{id}', ProductController::class . "@update");
    });
});
