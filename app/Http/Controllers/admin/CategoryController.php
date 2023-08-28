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
        $categories = Category::orderBy('created_at', 'DESC')->get();
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
        $validatedData = $request->validate([
            'name'=>['required','string','max:255'],
            'description' => ['nullable','string','max:255'],
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);

        if(request()->image){
            $imageName = time().rand(1,1000000) .'.'.request()->image->getClientOriginalExtension();
            $validatedData['image'] = $imageName;
            $img_loc = 'storage/images/categories/';
            request()->image->move($img_loc , $imageName);
        }

        $category = Category::create($validatedData);
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
    {
        $validatedData = $request->validate([
            'name'=>['required','string','max:255'],
            'description' => ['nullable','string','max:255'],
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);
        
        $category = Category::find($id);
        if(request()->image){
            $imageName = time().rand(1,1000000) .'.'.request()->image->getClientOriginalExtension();
            $validatedData['image'] = $imageName;
            $img_loc = 'storage/images/categories/';
            request()->image->move($img_loc , $imageName);
        }
       
        $category = Category::findOrFail($id);
        $category->update($validatedData);
        
        return redirect()->route('categories.index');
    }





    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $category = Category::find($id)->delete();
            DB::commit();
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Category contains subcategories!');
        }

    }

}
