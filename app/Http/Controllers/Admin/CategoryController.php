<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $category = new Category();
            $category->name = $validated_data['name'];
            $category->save();

            return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.categories')->with('error', 'Error while creating category.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category-edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $category->name = $validated_data['name'];
            $category->save();

            return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.categories')->with('error', 'Error while updating category.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.categories')->with('error', 'Error while deleting category.');
        }
    }
}
