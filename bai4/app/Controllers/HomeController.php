<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController
{
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        dd($product);
    }

    public function showAll()
    {
        $products = Category::select('products.*', 'categories.name as cate_name')
            ->join('products', 'category_id')
            ->orderBy('products.id', 'DESC')
            ->get();
        dd($products);
    }
}
