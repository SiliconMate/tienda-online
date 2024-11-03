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

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        Permission::create($request->all());

        return redirect()->route('permissions.index');
    }

    public function edit($permission)
    {
        return view('permissions.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($permission)
    {
        //
    }
}
