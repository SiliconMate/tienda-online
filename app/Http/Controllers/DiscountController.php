<?php

namespace App\Http\Controllers;

use App\Models\Discount;
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
        Discount::create($request->all());
    
        return redirect()->route('dashboard.discounts.index');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
