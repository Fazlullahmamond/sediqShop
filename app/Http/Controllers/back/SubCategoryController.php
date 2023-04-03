<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //retrieves all the subcategories from the database and returns them to the view.
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('subcategories.index', compact('subcategories'));
    }


    //This method returns the view for creating a new subcategory.
    public function create()
    {
        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }


    //This method receives the input from the create view and stores a new subcategory in the database.
    public function store(Request $request)
    {
        $subcategory = new SubCategory([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'category_id' => $request->input('category_id'),
        ]);
        $subcategory->save();
        return redirect()->route('subcategories.index');
    }


    //This method returns the view for editing an existing subcategory.
    public function edit($id)
    {
        $subcategory = SubCategory::find($id);
        $categories = Category::all();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }



    //receives the input from the edit view and updates an existing subcategory in the database.
    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        $subcategory->image = $request->input('image');
        $subcategory->category_id = $request->input('category_id');
        $subcategory->save();
        return redirect()->route('subcategories.index');
    }



    //This method deletes an existing subcategory from the database.
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect()->route('subcategories.index');
    }
}
