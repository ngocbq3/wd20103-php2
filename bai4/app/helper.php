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

/**
 * Hàm dd dùng để hiển thị dữ liệu cần bug
 * @param $data: dữ liệu hiển thị
 */
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

//hàm route trả về đường dẫn cho route
function route($route)
{
    return APP_URL . $route;
}

//Hàm redirect điều hướng website
function redirect($path)
{
    header("location: " . route($path));
    die;
}

//Hàm session_flash. lấy session dùng 1 lần
function session_flash($key, $value = null)
{
    //Nếu có value, thì sẽ tiến hành set dữ liệu cho session
    if ($value !== null) {
        $_SESSION['_flash'][$key] = $value;
    } else {
        //Nếu chỉ có key, thì lấy value ra
        if (isset($_SESSION['_flash_old'][$key])) {
            $value = $_SESSION['_flash_old'][$key];
            unset($_SESSION['_flash_old'][$key]);
            return $value;
        }
    }
    return null;
}

//Gọi ở đầu mỗi request, thông thường sẽ ở index
function flash_next_request()
{
    $_SESSION['_flash_old'] = $_SESSION['_flash'] ?? [];
    unset($_SESSION['_flash']);
}
