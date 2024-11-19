<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . $user->username . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('avatars', $filename, 'public');
            $user->avatar = $filename;
            $user->save();
        }

        return redirect()->route('dashboard.users.index');
    }

    // public function edit($user)
    // {
    // }

    public function update(Request $request, $user)
    {
        $request->validate([
            'username' => 'unique:users,username,'.$user,
            'email' => 'email|unique:users,email,'.$user,
            'phone' => 'numeric|nullable',
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find($user);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            $data = $request->except(['password']);
        }

        $user->update($data);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . $user->username . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('avatars', $filename, 'public');
            $user->avatar = $filename;
            $user->save();
        }

        return redirect()->route('dashboard.users.index');
    }

    public function destroy($user)
    {
        $user = User::find($user);
        $user->delete();

        return redirect()->route('dashboard.users.index');
    }

    public function show($user)
    {
        $user = User::find($user);
        return view('dashboard.users.show', compact('user'));
    }

    public function addRole(Request $request, $user)
    {
        $user = User::find($user);
        $role = Role::findByName($request->role, 'web');
        $user->assignRole($role);

        return redirect()->route('dashboard.users.index');
    }

    public function removeRole(Request $request, $user)
    {
        $user = User::find($user);
        $role = Role::findByName($request->role, 'web');
        $user->removeRole($role);

        return redirect()->route('dashboard.users.index');
    }

    public function addPermission(Request $request, $user)
    {
        $user = User::find($user);
        $perm = Permission::findByName($request->perm, 'web');
        $user->givePermissionTo($perm);

        return redirect()->route('dashboard.users.index');
    }

    public function removePermission(Request $request, $user)
    {
        $user = User::find($user);
        $perm = Permission::findByName($request->permission, 'web');
        $user->revokePermissionTo($perm);

        return redirect()->route('dashboard.users.index');
    }
}
