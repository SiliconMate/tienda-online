<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        User::create($request->all());

        return redirect()->route('users.index');
    }

    public function edit($user)
    {
        $user = User::find($user);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $user)
    {
        $user = User::find($user);
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    public function destroy($user)
    {
        $user = User::find($user);
        $user->delete();

        return redirect()->route('users.index');
    }

    public function show($user)
    {
        $user = User::find($user);
        return view('users.show', compact('user'));
    }
}
