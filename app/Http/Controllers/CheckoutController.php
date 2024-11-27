<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Services\MercadoPagoService;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Models\PaymentDetail;

class CheckoutController extends Controller
{
    public function __construct(
        private MercadoPagoService $mercadoPagoService
    ){}

    public function index()
    {
        $data = session()->get('checkout');

        session()->forget('checkout');

        if (!$data) {
            return redirect()->route('cart.index');
        }
        
        $user = Auth::user();
        $address = $user->addresses->first();

        $orderDetail = OrderDetail::create([
            'user_id' => $user->id,
            'total_price' => 0,
            'status' => 'pending',
            'address_id' => $address->id,
        ]);

        $totalPrice = 0;
        $orderItems = [];

        foreach ($data['items'] as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $orderDetail->id;
            $orderItem->product_id = $item['id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->save();

            $totalPrice += $item['quantity'] * Product::find($item['id'])->price;
            $orderItems[] = $orderItem;
        }

        
        $orderDetail->total_price = $totalPrice;
        $orderDetail->save();
        
        $orderItems = $orderDetail->orderItems->load('product');
        
        $preference = $this->mercadoPagoService->createPreference($orderItems);


        return view('shop.checkouts.checkout', compact('user', 'address', 'orderDetail', 'orderItems', 'preference'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        session()->put('checkout', $data);

        return response()->json([
            'message' => 'Orden creada con éxito.'
        ], 200);
    }

    public function completed(Request $request)
    {
        $status = $request->input('status');
        $paymentType = $request->input('payment_type');
        $externalReference = $request->input('external_reference');
        $totalPaid = $request->input('total_amount');

        $orderDetail = OrderDetail::where('id', $externalReference)->with('user')->first();

        if($orderDetail){
            if ($status === 'approved') {
                $orderDetail->status = 'completed';
                $orderDetail->completed_at = now();
                $orderDetail->save();
                PaymentDetail::create([
                    'order_id' => $orderDetail->id,
                    'payment_method' => $paymentType,
                    'provider' => 'MercadoPago',
                    'status' => 'completed',
                    'completed_at' => now(),
                    'total_paid' => $orderDetail->total_price,
                ]);
            }
        }

        return view('shop.checkouts.checkout-completed', compact('orderDetail'));
    }

    public function failed()
    {
        return view('shop.checkouts.checkout-failed');
    }


}
