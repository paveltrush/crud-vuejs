<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    protected static $pageTitle = "Products";
    public function index()
    {
        $products = Product::get();

        $pageTitle = static::$pageTitle;

        return view('product.index', compact('products', 'pageTitle'));
    }
}
