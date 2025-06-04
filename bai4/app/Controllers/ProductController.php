<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    public function index()
    {
        $products = Product::select('*')
            ->where('category_id', '=', 1)
            ->andWhere('price', '>', 50)
            ->orderBy('id', 'DESC')
            ->limit(8)
            ->get();
        dd($products);
    }

    public function store()
    {
        $data = [
            'name' => "Test 2",
            'image' => "No image",
            'price' => 100,
            'stock' => 110,
            'description' => "Mô tả 2",
            'category_id'   => 3
        ];

        $id = Product::create($data);
        dd($id);
    }

    public function update()
    {
        $data = [
            'name' => "Test 1 update",
            'image' => "No image",
            'price' => 120,
            'stock' => 999,
            'description' => "Mô tả 1 update",
            'category_id'   => 3
        ];

        Product::update(108, $data);
    }

    public function destroy()
    {
        Product::delete(108);
    }
}
