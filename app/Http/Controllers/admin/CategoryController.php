<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{

    //retrieves all the categories from the database and returns them to the view.
    public function index()
    {
        $categories = Category::All();
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
        $data = array();
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        $data['image'] = $imageName;
        $img_loc = 'storage/images/categories/';
        request()->image->move($img_loc , $imageName);
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        DB::table('categories')->insert($data);
        return redirect()->back()->with('success', 'Saved successfully');
    }


        /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }


    // returns the view for editing an existing category.
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }
  






  

    //receives the input from the edit view and updates an existing category in the database.
    public function update(Request $request, $id)
    // {
    //     $category = Category::find($id);
    //     $category->name = $request->input('name');
    //     $category->description = $request->input('description');
    //     // $category->image = $request->input('image');
    //     $category->save();
    //     return redirect()->route('categories.index');
    // }
    {
        $category = Category::find($id);
        $imageName = time().rand(1,1000000) .'.'.request()->image->getClientOriginalExtension();
        $data['image'] = $imageName;
        $img_loc = 'storage/images/categories/';
        request()->image->move($img_loc , $imageName);
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        DB::table('categories')->where('id',$id)->update($data);
        return redirect()->route('categories.index');
    }





    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        return redirect()->route('categories.index');

    }

}