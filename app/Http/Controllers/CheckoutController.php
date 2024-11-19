<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $address = $user->addresses()->first(); 
        // $cartItems = \Cart::getContent(); 
        // $subtotal = \Cart::getSubTotal(); no se si esto funciona asi
        // $discountPercentage = 0;
        // $discountAmount = 0;
        // $total = $subtotal;

        return view('shop.checkouts.checkout', compact('user', 'address'));
    }

    public function applyDiscount(Request $request){
        $request->validate([
            'discount_code' => 'required|string',
        ]);

        $discountCode = $request->input('discount_code');
        $discountPercentage = 0;

        // Aquí puedes agregar la lógica para verificar el código de descuento
        if ($discountCode === 'DESCUENTO20') {
            $discountPercentage = 20;
        }

        $cartItems = \Cart::getContent();
        $subtotal = \Cart::getSubTotal();
        $discountAmount = ($subtotal * $discountPercentage) / 100;
        $total = $subtotal - $discountAmount;

        return view('shop.checkouts.checkout', compact('cartItems', 'subtotal', 'discountAmount', 'total', 'discountPercentage', 'discountCode'));
    }

    public function completed()
    {
        return view('shop.checkouts.checkout-completed');
    }


}
