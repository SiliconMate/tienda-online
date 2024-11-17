<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Discount;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('min') && $request->min != null) {
            $query->where('price', '>=', $request->min);
        }

        if ($request->has('max') && $request->max != null) {
            $query->where('price', '<=', $request->max);
        }

        $products = $query->get();

        return view('shop.products.index', compact('products'));
    }

    public function show($product){

        $product = Product::findOrFail($product);
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();
        $discountedPrice = session('discountedPrice');

        return view('shop.products.show', compact('product', 'relatedProducts', 'discountedPrice'));
    }

    public function applyDiscount(Request $request, $productId){
        $product = Product::findOrFail($productId);
        $discountCode = $request->input('discount_code');

        $discount = Discount::where('code', $discountCode)->where('active', 1)->first();

        if ($discount) {
            $discountedPrice = $product->price - ($product->price * ($discount->percentage / 100));
            return redirect()->route('products.show', $product->id)->with('discountedPrice', $discountedPrice);
        } else {
            return redirect()->back()->withErrors(['discount_code' => 'Código de descuento no válido o inactivo.']);
        }
    }
}
