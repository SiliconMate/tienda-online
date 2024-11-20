<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('dashboard.products.index', compact('products'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'code' => 'required|numeric|unique:products',
            'category_id' => 'required|exists:categories,name',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|numeric',
            'min_quantity' => 'required|numeric',
            'max_quantity' => 'required|numeric',
        ]);

        $category_id = Category::where('name', $request->category_id)->first();
        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id' => $category_id->id,
            'price' => $request->price,
            'code' => $request->code,
        ]);

        if($request->hasFile('image')) {
            foreach($request->file('image') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('products', $filename, 'public');
                $product->images()->create(['path' => $filename]);
            }
        }

        $product->inventory()->create([
            'quantity' => $request->quantity,
            'min_quantity' => $request->min_quantity,
            'max_quantity' => $request->max_quantity,
            'storage_location' => '',
        ]);

        return redirect()->route('dashboard.products.index');
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        
        return view('dashboard.products.show', compact('product'));        
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'code' => 'required|numeric|unique:products,code,' . $id,
            'category_id' => 'required|exists:categories,id',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'code' => $request->code,
        ]);

        if($request->hasFile('image')) {
            foreach($request->file('image') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('products', $filename, 'public');
                $product->images()->create(['path' => $filename]);
            }
        }

        return redirect()->route('dashboard.products.index');
    }

    public function destroy(string $id)
    {
        Product::destroy($id);
        
        return back();
    }

    public function destroyImage(Product $product, string $image)
    {
        $product->images()->where('id', $image)->delete();
        
        return back();
    }

    public function updateInventory(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|numeric',
            'min_quantity' => 'required|numeric',
            'max_quantity' => 'required|numeric',
            'storage_location' => 'required|string',
        ]);

        $product->inventory()->update([
            'quantity' => $request->quantity,
            'min_quantity' => $request->min_quantity,
            'max_quantity' => $request->max_quantity,
            'storage_location' => $request->storage_location,
        ]);

        return back();
    }
}
