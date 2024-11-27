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
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|array',
            'content.*' => 'string',
            'rating' => 'required|array',
            'rating.*' => 'integer|min:1|max:5',
        ]);

        foreach ($request->product_id as $index => $productId) {
            if (Opinion::where('product_id', $productId)->where('user_id', $request->user_id)->exists()) {
                continue;
            }
            Opinion::create([
                'product_id' => $productId,
                'user_id' => $request->user_id,
                'content' => $request->content[$index],
                'rating' => $request->rating[$productId],
            ]);
        }

        return redirect()->back()->with('success', '¡Gracias por tu opinión!');
    }
}
