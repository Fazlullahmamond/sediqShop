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
        $subcategories = SubCategory::orderBy('created_at', 'DESC')->get();
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

        $validatedData = $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['nullable','string','max:255'],
            'selecter' => 'required|integer|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);

        if(request()->image){
            $imageName = time().rand(1,1000000) .'.'.request()->image->getClientOriginalExtension();
            $validatedData['image'] = $imageName;
            $img_loc = 'storage/images/subcategories/';
            request()->image->move($img_loc , $imageName);
        } 
   
        $subcategory = SubCategory::create($validatedData);
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
        $validatedData = $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['nullable','string','max:255'],
            'selecter' => 'required|integer|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);
        
        if(request()->image){
            $imageName = time().rand(1,1000000) .'.'.request()->image->getClientOriginalExtension();
            $validatedData['image'] = $imageName;
            $img_loc = 'storage/images/subcategories/';
            request()->image->move($img_loc , $imageName);
        } 

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update($validatedData);
        return redirect()->route('subcategories.index')->with('success', 'Saved successfully');
    }



    //This method deletes an existing subcategory from the database.
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $category = SubCategory::find($id)->delete();
            DB::commit();
            return redirect()->route('subcategories.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'subcategory contains category!');
        }

    }
}
