<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function index()
    {
        $opinions = Opinion::all();

        return view('dashboard.opinions.index', compact('opinions'));
    }

    public function destroy(string $id)
    {
        $opinion = Opinion::find($id);
        $opinion->delete();

        return redirect()->route('dashboard.opinions.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
            'rating' => 'required|integer|min=1|max=5',
        ]);

        Opinion::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', '¡Gracias por tu opinión!');
    }
}
