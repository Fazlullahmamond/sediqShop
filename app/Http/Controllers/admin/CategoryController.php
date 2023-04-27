<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    //retrieves all the categories from the database and returns them to the view.
    public function index()
    {
        $categories = Category::all();
        return view('admin.all_categories', compact('categories'));
    }


    //returns the view for creating a new category.
    public function create()
    {
        return view('categories.create');
    }


    // receives the input from the create view and stores a new category in the database.
    public function store(Request $request)
    {
        $category = new Category([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
        ]);
        $category->save();
        return redirect()->route('categories.index');
    }


    // returns the view for editing an existing category.
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }


    //receives the input from the edit view and updates an existing category in the database.
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->image = $request->input('image');
        $category->save();
        return redirect()->route('categories.index');
    }

}
