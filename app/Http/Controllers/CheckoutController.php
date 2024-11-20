<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Services\MercadoPagoService;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct(
        private MercadoPagoService $mercadoPagoService
    ){}

    public function index()
    {
        $data = session()->get('checkout');

        $user = Auth::user();
        $address = $user->addresses->first();

        if (!$address) {
            $address = new Address();
            $address->user_id = $user->id;
            // Asignar otros campos necesarios para la dirección
            $address->save();
        }

        $orderDetail = new OrderDetail();
        $orderDetail->user_id = $user->id;
        $orderDetail->address_id = $address ? $address->id : $user->id; // Usar la dirección por defecto o el id del usuario
        $orderDetail->total_price = 0;
        $orderDetail->save();

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

    public function applyDiscount(Request $request){
        // $request->validate([
        //     'discount_code' => 'required|string',
        // ]);

        // $discountCode = $request->input('discount_code');
        // $discountPercentage = 0;

        // // Aquí puedes agregar la lógica para verificar el código de descuento
        // if ($discountCode === 'DESCUENTO20') {
        //     $discountPercentage = 20;
        // }

        // $cartItems = \Cart::getContent();
        // $subtotal = \Cart::getSubTotal();
        // $discountAmount = ($subtotal * $discountPercentage) / 100;
        // $total = $subtotal - $discountAmount;

        // return view('shop.checkouts.checkout', compact('cartItems', 'subtotal', 'discountAmount', 'total', 'discountPercentage', 'discountCode'));
    }

    public function completed()
    {
        return view('shop.checkouts.checkout-completed');
    }


}
