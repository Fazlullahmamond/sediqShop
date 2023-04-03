<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|max:2048',
            'tags' => 'required'
        ]);

        $blog = new Blog();

        $blog->title = $validatedData['title'];
        $blog->description = $validatedData['description'];
        $blog->tags = $validatedData['tags'];

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('blog_images'), $filename);
            $blog->image = $filename;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }


    /**
     * Read a blog post:
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'tags' => 'required'
        ]);

        $blog->title = $validatedData['title'];
        $blog->description = $validatedData['description'];
        $blog->tags = $validatedData['tags'];

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('blog_images'), $filename);
            $blog->image = $filename;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog post updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete image file if it exists
        if (!empty($blog->image)) {
            Storage::delete(public_path('blog_images/' . $blog->image));
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully.');
    }

}
