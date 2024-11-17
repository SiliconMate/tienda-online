<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Discount;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop.products.index', compact('products'));
    }

    public function show($product){

        $product = Product::findOrFail($product);
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();

        return view('shop.products.show', compact('product', 'relatedProducts'));
    }

    public function applyDiscount(Request $request, $productId){
        $product = Product::findOrFail($productId);
        $discountCode = $request->input('discount_code');

        $discount = Discount::where('code', $discountCode)->where('active', 1)->first();

        if ($discount) {
            $discountedPrice = $product->price - ($product->price * ($discount->percentage / 100));

            return redirect()->route('products.show', $product->id)->with(compact('discountedPrice', 'discount'));
        } else {
            return redirect()->back()->withErrors(['discount_code' => 'Código de descuento no válido o inactivo.']);
        }
    }
}
