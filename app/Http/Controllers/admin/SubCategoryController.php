<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    //retrieves all the subcategories from the database and returns them to the view.
    public function index()
    {
        $subcategories = SubCategory::All();
        $categories = category::All();
        return view('admin.all_subcategories', compact('subcategories','categories'));
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
        $data = array();
        if(request()->image){
            $imageName = time().rand(1,1000000) .'.'.request()->image->getClientOriginalExtension();
            $data['image'] = $imageName;
            $img_loc = 'storage/images/subcategories/';
            request()->image->move($img_loc , $imageName);
        } 
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['category_id'] = $request->selecter;
        $data['created_at'] = now();
        DB::table('sub_categories')->insert($data);
        return redirect()->back()->with('success', 'Saved successfully');
    }

       /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subcategory = SubCategory::find($id);
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
        
    }



    //This method returns the view for editing an existing subcategory.
    public function edit($id)
    {
        $subcategory = SubCategory::find($id);
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }



    //receives the input from the edit view and updates an existing subcategory in the database.
    public function update(Request $request, $id)
    {
        $data = array();
        if(request()->image){
            $imageName = time().rand(1,1000000) .'.'.request()->image->getClientOriginalExtension();
            $data['image'] = $imageName;
            $img_loc = 'storage/images/subcategories/';
            request()->image->move($img_loc , $imageName);
        } 
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['category_id'] = $request->selecter;
        $data['updated_at'] = now();
        DB::table('sub_categories')->where('id',$id)->update($data);
        return redirect()->back()->with('success', 'Saved successfully');
    }



    //This method deletes an existing subcategory from the database.
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect()->route('subcategories.index');
    }
}
