<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . $category->slug . '.' . $image->getClientOriginalExtension();
            $image->storeAs('categories', $filename, 'public');
            $category->path = $filename;
            $category->save();
        }

        return redirect()->route('dashboard.categories.index');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->save();

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . $category->slug . '.' . $image->getClientOriginalExtension();
            $image->storeAs('categories', $filename, 'public');
            $category->path = $filename;
            $category->save();
        }

        return redirect()->route('dashboard.categories.index');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('dashboard.categories.index');
    }
}
