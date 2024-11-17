<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $orders = OrderDetail::where('status', 'completed')->get();

        return view('dashboard.sales.index', compact('orders'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(string $id)
    {
        
    }
    
    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
