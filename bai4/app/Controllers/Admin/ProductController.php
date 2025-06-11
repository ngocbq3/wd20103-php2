<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;

class ProductController
{
    public function index()
    {
        $products = Category::select('products.*', 'categories.name as cate_name')
            ->join('products', 'category_id')
            ->orderBy('products.id', 'DESC')
            ->get();
        return view("admin.products.index", compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view("admin.products.create", compact('categories'));
    }

    public function store()
    {
        $product = $_POST;

        //Validate
        $errors = [];
        if ($product['name'] == "") {
            $errors['name'] = "Bạn chưa nhập vào tên";
        }
        if ($product['price'] == "" || $product['price'] < 0) {
            $errors['price'] = "Bạn cần nhập giá là số nguyên dương";
        }

        //Xử lý file ảnh
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            //Lấy đường dẫn hình ảnh
            $image = "images/" . $file['name'];

            //Validate image
            //mảng định dạng ảnh được phép upload
            $imgs = ['jpg', 'jpeg', 'png', 'gif'];
            //Lấy ra định dạng của file
            $file_ext = pathinfo($image, PATHINFO_EXTENSION);
            //Kiểm tra định dạng của file
            if (in_array($file_ext, $imgs)) {
                //upload file
                move_uploaded_file($file['tmp_name'], $image);
                //đưa image vào mảng product
                $product['image'] = $image;
            } else {
                $errors['image'] = "Định dạng không được phép";
            }
        }

        //Nếu có lỗi validate
        if ($errors) {
            $categories = Category::all();
            return view("admin.products.create", compact("categories", "errors", "product"));
        }
        //Lưu vào database
        Product::create($product);

        return redirect('admin/products');
    }

    public function destroy($id)
    {
        Product::delete($id);
        return redirect('admin/products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        //Lấy thông báo
        // $message = $_SESSION['message'] ?? '';
        // //Xóa session
        // unset($_SESSION['message']);
        return view("admin.products.edit", compact("product", "categories"));
    }

    public function update($id)
    {
        $product = $_POST;

        //Xử lý file ảnh
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            //Lấy đường dẫn hình ảnh
            $image = "images/" . $file['name'];
            //upload file
            move_uploaded_file($file['tmp_name'], $image);
            //đưa image vào mảng product
            $product['image'] = $image;
            //lấy sản phẩm cũ
            $product_old = Product::find($id);
        }

        // $_SESSION['message'] = "Cập nhật dữ liệu thành công";
        session_flash('message', 'Cập nhật dữ liệu thành công');
        Product::update($id, $product);
        if ($file['size'] > 0) {
            if (file_exists($product_old->image)) {
                unlink($product_old->image); //xóa ảnh cũ
            }
        }
        return redirect("admin/products/edit/" . $id);
    }
}
