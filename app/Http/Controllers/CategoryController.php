<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view ('pages.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('pages.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = new Category;
        $category->name = $request->name;

        if ($request->hasFile('image')){
        $image = $request->file('image');
        $image->storeAs('public/categories', $category->id . '.' . $image->getClientOriginalExtension());
        $category->image='storage/categories/' . $category->id .'.'. $image->getClientOriginalExtension();
        $category->save();
        }

        return redirect()->route('categories.index')->with('success', 'products sucessfully Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view ('pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        if ($request->hasFile('image')){
        $image = $request->file('image');
        $image->storeAs('public/categories', $category->id . '.' . $image->getClientOriginalExtension());
        $category->image='storage/categories/' . $category->id .'.'. $image->getClientOriginalExtension();
        $category->save();
        }
        return redirect()->route('categories.index')->with('success', 'products sucessfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'user sucessfully Deleted');
    }
}
