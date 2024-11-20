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
        $opinions = Opinion::where('user_id', $user->id)->get();

        return view('dashboard.user-opinions.index', compact('opinions'));
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $opinion = Opinion::findOrFail($id);
        $opinion->update($request->all());

        return redirect()->route('dashboard.useropinions.index');
    }

    public function destroy(string $id)
    {
        $opinion = Opinion::findOrFail($id);
        $opinion->delete();

        return redirect()->route('dashboard.user-opinions.index');
    }
}
