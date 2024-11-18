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


        return view('shop.checkout', compact('user', 'address'));
    }
}
