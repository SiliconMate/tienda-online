<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        Role::create($request->all());

        return redirect()->route('roles.index');
    }

    public function edit($role)
    {
        return view('roles.edit');
    }

    public function update(Request $request, $role)
    {
        $role = Role::find($role);
        $role->update($request->all());

        return redirect()->route('roles.index');
    }

    public function destroy($role)
    {
        $role = Role::find($role);
        $role->delete();

        return redirect()->route('roles.index');
    }

    public function show($role)
    {
        return view('roles.show');
    }
}
