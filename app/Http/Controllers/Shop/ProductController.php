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

        $averageRating = $product->opinions()->avg('rating');

        $reviewCount = $product->opinions()->count();

        $inventory = $product->inventory;

        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();

        $images = $product->images()->take(6)->get();

        $opinions = $product->opinions()->with('user')->get();

        return view('shop.products.show', compact('product', 'averageRating', 'reviewCount', 'inventory', 'relatedProducts', 'images', 'opinions'));
    }

    public function applyDiscount(Request $request, $productId){
        $product = Product::findOrFail($productId);
        $discountCode = $request->input('discount_code');

        $discount = Discount::where('code', $discountCode)->where('active', 1)->first();

        if ($discount) {
            $discountedPrice = $product->price - ($product->price * ($discount->percentage / 100));
            $averageRating = $product->opinions()->avg('rating');
            $reviewCount = $product->opinions()->count();
            $inventory = $product->inventory;

            // Obtener productos relacionados
            $relatedProducts = Product::where('category_id', $product->category_id)
                                    ->where('id', '!=', $product->id)
                                    ->take(4)
                                    ->get();

            return view('shop.products.show', compact('product', 'discountedPrice', 'discount', 'averageRating', 'reviewCount', 'inventory', 'relatedProducts'));
        } else {
            return redirect()->back()->withErrors(['discount_code' => 'Código de descuento no válido o inactivo.']);
        }
    }
}
