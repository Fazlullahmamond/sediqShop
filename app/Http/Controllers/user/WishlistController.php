<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()){
            // Get the authenticated user's wishlist items
            $wishlistItems = auth()->user()->wishlist;
            return view('front.wishlist', compact('wishlistItems'));
        }else{
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all products that are not already in the user's wishlist
        $products = Product::whereNotIn('id', auth()->user()->wishlist->pluck('id'))->get();

        return view('wishlist.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //     ]);

    //     // Add the product to the user's wishlist
    //     auth()->user()->wishlist()->attach($validatedData['product_id']);

    //     return redirect()->route('wishlist.index')->with('success', 'Product added to wishlist.');
    // }

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     // Remove the product from the user's wishlist
    //     auth()->user()->wishlist()->detach($id);

    //     return redirect()->route('wishlist.index')->with('success', 'Product removed from wishlist.');
    // }
}
