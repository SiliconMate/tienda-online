<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrderDetail::whereIn('status', ['pending', 'processing', 'cancelled'])->get();

        return view('dashboard.orders.index', compact('orders'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(string $id)
    {
        $order = OrderDetail::findOrFail($id);

        return view('dashboard.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cancel(Request $request, string $id)
    {
        $order = OrderDetail::findOrFail($id);
        $order->status = 'cancelled';
        $order->save();

        // agregar lo del envio del mail

        return redirect()->route('dashboard.orders.index');
    }

    public function accept(Request $request, string $id)
    {
        $order = OrderDetail::findOrFail($id);
        $order->status = 'processing';
        $order->save();

        $order = OrderDetail::findOrFail($id);

        // enviar mail

        return redirect()->route('dashboard.orders.index');
    }

    public function complete(string $id)
    {
        $order = OrderDetail::findOrFail($id);
        $order->status = 'completed';
        $order->completed_at = now();
        $order->save();

        return redirect()->route('dashboard.userbuys.index');
    }


}
