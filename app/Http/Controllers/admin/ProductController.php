<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            'quantity' => 'required|integer|min:1',
            'all_details' => 'required',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'tags' => 'nullable|string',
            'hot_offer' => 'nullable|boolean',
            'feature' => 'nullable|boolean',
            'status' => 'nullable|integer|min:0|max:1',
            'views' => 'nullable|integer|min:0',
        ]);

        $product = Product::create($validatedData);

        // create the product sizes
        $sizes = $request->input('sizes', []);
        $product->sizes()->createMany($sizes);

        // Upload and save the product images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products');
                $productImage = new ProductImage([
                    'image_path' => $imagePath,
                ]);
                $product->images()->save($productImage);
            }
        }

        return response()->json($product, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
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

        return response()->json(null, 204);
    }

}
