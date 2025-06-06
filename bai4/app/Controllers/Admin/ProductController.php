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

        //Xử lý file ảnh
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            //Lấy đường dẫn hình ảnh
            $image = "images/" . $file['name'];
            //upload file
            move_uploaded_file($file['tmp_name'], $image);
            //đưa image vào mảng product
            $product['image'] = $image;
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
}
