<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('shop.categories.index', compact('categories'));
    }
    
    public function show(Category $category)
    {
        $products = $category->products;
        return view('shop.categories.show', compact('products'));
    }
}
