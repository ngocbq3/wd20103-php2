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
            'name' => "Test 1",
            'image' => "No image",
            'price' => 120,
            'stock' => 99,
            'description' => "Mô tả 1",
            'category_id'   => 3
        ];

        $id = Product::create($data);
        dd($id);
    }
}
