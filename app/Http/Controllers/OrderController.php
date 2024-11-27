<?php

namespace App\Http\Controllers;

use App\Mail\InformarCanceladoMail;
use App\Mail\InformarEnvioMail;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $mesanje = $request->input('message');
        Mail::to($order->user->email)->send(new InformarCanceladoMail($order, $mesanje));

        return redirect()->route('dashboard.orders.index');
    }

    public function accept(Request $request, string $id)
    {
        $order = OrderDetail::findOrFail($id);
        $order->status = 'processing';
        $order->save();

        $order = OrderDetail::findOrFail($id);

        $mensaje = $request->input('message');
        Mail::to($order->user->email)->send(new InformarEnvioMail($order, $mensaje));

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
