<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::select('*')
            ->where('email', '=', $email)
            ->get();

        //Nếu người dùng nhập đúng email
        if ($user) {
            $user = $user[0];
            //Kiểm tra mật khẩu
            if (password_verify($password, $user->password)) {
                //Lưu thông tin user vào session
                $_SESSION['user'] = $user;
                //Chuyển sang trang admin
                redirect('admin/products');
            } else {
                $errors['auth'] = "Thông tin email hoặc password không chính xác";
            }
        } else {
            $errors['auth'] = "Thông tin email hoặc password không chính xác";
        }

        return view('auth.login', compact('email', 'errors'));
    }

    public function register()
    {
        return view('auth.register');
    }
    public function postRegister()
    {
        $data = $_POST; //lấy dữ liệu từ form

        //Mã hóa mật khẩu
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        //Lưu vào database
        User::create($data);
        //chuyển sang trang login
        redirect('auth/login');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        redirect('auth/login');
    }
}
