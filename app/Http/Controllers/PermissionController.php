<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        Permission::create($request->all());

        return redirect()->route('permissions.index');
    }

    public function update(Request $request, $permission)
    {
        $permission = Permission::find($permission);
        $permission->update($request->all());

        return redirect()->route('permissions.index');
    }

    public function destroy($permission)
    {
        $permission = Permission::find($permission);
        $permission->delete();

        return redirect()->route('permissions.index');
    }
}
