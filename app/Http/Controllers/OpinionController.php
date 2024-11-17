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
}
