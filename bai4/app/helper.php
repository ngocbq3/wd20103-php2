<?php

use eftec\bladeone\BladeOne;

/**
 * hàm view dùng để render giao diện
 * $view: template blade view
 * $data: dữ liệu
 **/
function view($view, $data = [])
{
    $views = APP_DIR . '/resources/views';
    $cache = APP_DIR . '/resources/cache';
    $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
    echo $blade->run($view, $data); // it calls /views/$view.blade.php
}
