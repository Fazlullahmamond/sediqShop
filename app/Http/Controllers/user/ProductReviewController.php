<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product_id)
    {
        $product = Product::findOrFail($product_id);
        $reviews = ProductReview::where('product_id', $product_id)->where('status', 1)->get();

        return view('product_reviews.index', compact('product', 'reviews'));
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
    public function store(Request $request, $product_id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'required|string|max:500',
        ]);

        $user_id = auth()->user()->id;

        $review = new ProductReview();
        $review->user_id = $user_id;
        $review->product_id = $product_id;
        $review->title = $validatedData['title'];
        $review->rating = $validatedData['rating'];
        $review->description = $validatedData['description'];
        $review->status = 1;
        $review->save();

        return redirect()->back()->with('success', 'Product review added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            'title' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'required|string|max:500',
        ]);

        $review = ProductReview::findOrFail($id);
        $review->title = $validatedData['title'];
        $review->rating = $validatedData['rating'];
        $review->description = $validatedData['description'];
        $review->save();

        return redirect()->back()->with('success', 'Product review updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = ProductReview::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Product review deleted successfully.');
    }

}
