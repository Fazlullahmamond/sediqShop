<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\size;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('admin.list_products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = SubCategory::all();
        $sizes = size::All();
        return view('admin.add_product',compact('categories','sizes'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric',
            'discount' => 'nullable|integer|min:0|max:99',
            'quantity' => 'required|integer|min:0',
            'all_details' => 'required',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'tags' => 'nullable|string',
            'hot_offer' => 'nullable|boolean',
            'feature' => 'nullable|boolean',
            'status' => 'nullable|integer|min:0|max:1',
            'views' => 'nullable|integer|min:0',
        ]);

        $product = Product::create($validatedData);

        // // Upload and save the product images
        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $image) {
        //         $imagePath = $image->store('products');
        //         $productImage = new ProductImage([
        //             'image_path' => $imagePath,
        //         ]);
        //         $product->images()->save($productImage);
        //     }
        // }
        // $data = array();
        // if(request()->image){
        //     $imageName = time().rand(1,1000000) .'.'.request()->image->getClientOriginalExtension();
        //     $data['image'] = $imageName;
        //     $img_loc = 'storage/images/products/';
        //     request()->image->move($img_loc , $imageName);
        // } 
        // DB::table('product_images')->insert($data);

        // $size = array();
        // $size['name'] = $request->size;
        // DB::table('products_size')->insert($size);
        return redirect()->back()->with('success', 'Saved successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $products = Product::all();
        return view('admin.list_products',compact('products'));



    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        return view('admin.categories.edit', compact('category'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image',
            'slug' => 'required|unique:products,slug,'.$id,
            'price' => 'required|numeric',
            'discount' => 'nullable|integer|min:0|max:99',
            'quantity' => 'required|integer|min:1',
            'all_details' => 'required',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'tags' => 'nullable|string',
            'hot_offer' => 'nullable|boolean',
            'feature' => 'nullable|boolean',
            'status' => 'nullable|integer|min:0|max:1',
            'views' => 'nullable|integer|min:0',
        ]);

        $product = Product::findOrFail($id);

        // update the product sizes
        $sizes = $request->input('sizes', []);
        $product->sizes()->sync($sizes);

        // check if any images were uploaded
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                // store the image in your server
                $filename = $image->store('products');

                // save the image in the product_images table
                $product->images()->create([
                    'image' => $filename
                ]);
            }
        }

        // check if any images need to be deleted
        if ($request->has('delete_images')) {
            $delete_images = $request->input('delete_images');
            foreach ($delete_images as $image_id) {
                // delete the old image file from your server
                $image = ProductImage::findOrFail($image_id);
                unlink(storage_path('app/public/' . $image->image));

                // remove the record from the product_images table
                $image->delete();
            }
        }

        $product->update($validatedData);

        return response()->json($product, 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Saved successfully');


        // return response()->json(null, 204);
    }


    public function product_reviews()
    {
        //
        $product_reviews = ProductReview::all();
        return view('admin.product_reviews', compact('product_reviews'));
    }
}
