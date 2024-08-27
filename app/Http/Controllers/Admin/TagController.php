<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag-create');
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
            $tag = new Tag();
            $tag->name = $validated_data['name'];
            $tag->save();

            return redirect()->route('admin.tags')->with('success', 'Tag created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.tags')->with('error', 'Error while creating tags.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag-edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $tag->name = $validated_data['name'];
            $tag->save();

            return redirect()->route('admin.tags')->with('success', 'Tag updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.tags')->with('error', 'Error while updating tags.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            return redirect()->route('admin.tags')->with('success', 'Tag deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.tags')->with('error', 'Error while deleting tag.');
        }
    }
}
