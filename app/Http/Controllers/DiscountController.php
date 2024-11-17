<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();

        return view('dashboard.discounts.index', compact('discounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:discounts',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $discount = Discount::create($request->all());
        $discount->active = $request->active ?? 0;
        $discount->save();
    
        return redirect()->route('dashboard.discounts.index');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:discounts,id,' . $id,
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $discount = Discount::find($id);
        $discount->update($request->all());

        $discount->active = $request->active ?? 0;
        $discount->save();

        return redirect()->route('dashboard.discounts.index');
    }

    public function destroy(string $id)
    {
        $discount = Discount::find($id);
        $discount->delete();

        return redirect()->route('dashboard.discounts.index');
    }

    public function addProduct(Request $request, $discount)
    {
        $request->validate([
            'product_name' => 'required|exists:products,name',
        ]);

        $product = Product::where('name', $request->product_name)->first();

        if (!$product->discounts->contains($discount)) {
            $product->discounts()->attach($discount);
        }

        return redirect()->route('dashboard.discounts.index');
    }

    public function removeProduct($discount, $product)
    {
        $discount = Discount::find($discount);
        $discount->products()->detach($product);

        return redirect()->route('dashboard.discounts.index');
    }
}
