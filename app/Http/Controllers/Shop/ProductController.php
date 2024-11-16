<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop.products.index', compact('products'));
    }
    
    public function show($product)
    {
        $product = Product::find($product);
        return view('shop.products.show', compact('product'));
    }
}
