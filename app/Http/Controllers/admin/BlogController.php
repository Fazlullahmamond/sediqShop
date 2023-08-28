<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        return view('admin.list_blogs', compact('blogs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string','max:255'],
            'image' => 'required|mimes:jpeg,png,jpg,gif',
            'tags' => ['nullable','string','max:255']
        ]);

        if(request()->image){
            $imageName = time().rand(1,1000000) .'.'.request()->image->getClientOriginalExtension();
            $validatedData['image'] = $imageName;
            $img_loc = 'storage/images/blogs/';
            request()->image->move($img_loc , $imageName);
        }

        $blog = Blog::create($validatedData);
        return to_route('blog.index')->with('success', 'Blog post created successfully.');  
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
    public function edit($id)
    {   $blog = Blog::find($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string','max:255'],
            'tags' => ['nullable','string','max:255']
        ]);
        
        if(request()->image){
            $validatedData = $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif',
            ]);
            $imageName = time().rand(1,1000000) .'.'.request()->image->getClientOriginalExtension();
            $validatedData['image'] = $imageName;
            $img_loc = 'storage/images/blogs/';
            request()->image->move($img_loc , $imageName);
        }

        $blog = Blog::findOrFail($id);
        $blog->update($validatedData);

        return redirect()->route('blog.index')->with('success', 'Blog post created successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = blog::find($id)->delete();
        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully.');
    }

}
