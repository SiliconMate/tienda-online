<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $addresses = $user->addresses;

        return view('dashboard.user-addresses.index', compact('addresses'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'address_line' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'phone' => 'string',
            'comment' => 'required|string',
        ]);
        
        $user = Auth::user();
        $user->addresses()->create($request->all());

        return redirect()->route('dashboard.useraddresses.index');
    }

    public function show(string $id)
    {

    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'address_line' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'phone' => 'string',
            'comment' => 'required|string',
        ]);

        $user = Auth::user();
        $address = $user->addresses()->findOrFail($id);
        $address->update($request->all());

        return redirect()->route('dashboard.useraddresses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $address = $user->addresses()->findOrFail($id);
        $address->delete();

        return redirect()->route('dashboard.useraddresses.index');
    }
}