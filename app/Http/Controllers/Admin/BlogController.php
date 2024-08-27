<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.blog-create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'sometimes:boolean',
            'tag_id' => 'exists:tags,id'
        ]);



        try {
            // Create a new blog instance
            $blog = new Blog();
            $blog->title = $request->input('title');
            $blog->description = $request->input('description'); // Store the rich text content
            $blog->slug = Str::slug($request->input('title'));
            $blog->is_published = $request->boolean('is_published', false);
            $blog->user_id = auth()->id();
            $blog->category_id = $request->input('category_id');

            // Save the blog post to the database
            $blog->save();

            if ($request->has('tag_id')) {
                $blog->tags()->attach($request->input('tag_id'));
            }

            // Redirect with a success message
            return redirect()->route('admin.blogs')->with('success', 'Blog post created successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            dd($e);

            // Redirect with an error message
            return redirect()->route('admin.blogs')->with('error', 'An error occurred while creating the post!');
        }
    }


    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {

        $categories = Category::all();

        return view('admin.blog-edit', compact(['blog', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'sometimes:boolean',
        ]);


        try {
            // Create a new blog instance
            $blog->title = $request->input('title');
            $blog->description = $request->input('description');
            $blog->slug = Str::slug($request->input('title'));
            $blog->is_published = $request->boolean('is_published', false);
            $blog->category_id = $request->input('category_id');

            $blog->save();

            // Redirect with a success message
            return redirect()->route('admin.blogs')->with('success', 'Blog post updated successfully!');
        } catch (\Exception $e) {
            // Redirect with a success message
            return redirect()->route('admin.blogs')->with('error', 'Error occured while updating post!');
        }
    }

    public function updateImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();
            return redirect()->route('admin.blogs')->with('success', 'Blog deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.blogs')->with('error', 'Error while deleting blog.');
        }
    }
}
