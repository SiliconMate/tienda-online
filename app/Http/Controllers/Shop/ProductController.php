<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filtrar por término de búsqueda
        if ($request->has('query') && $request->query('query') != null) {
            $query->where('name', 'like', '%' . $request->query('query') . '%');
        }

        // Filtrar por rango de precios
        if ($request->has('min') && $request->query('min') != null) {
            $query->where('price', '>=', $request->query('min'));
        }
        if ($request->has('max') && $request->query('max') != null) {
            $query->where('price', '<=', $request->query('max'));
        }

        // Ordenar resultados
        if ($request->has('sort') && $request->query('sort') != null) {
            switch ($request->query('sort')) {
                case 'price-low-to-high':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price-high-to-low':
                    $query->orderBy('price', 'desc');
                    break;
                case 'latest':
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        $products = $query->get();
        return view('shop.products.index', compact('products'));
    }

    public function show($product){

        $product = Product::findOrFail($product);
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();

        return view('shop.products.show', compact('product', 'relatedProducts'));
    }
}
