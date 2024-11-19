<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOpinionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $opinions = $user->products->map(function($product) {
        //     return [
        //         'product_id' => $product->id,
        //         'content' => $product->pivot->content,
        //         'rating' => $product->pivot->rating,
        //     ];
        // });
        $opinions = Opinion::where('user_id', $user->id)->get();

        return view('dashboard.user-opinions.index', compact('opinions'));
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
