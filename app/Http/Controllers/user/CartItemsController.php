<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CartItems;
use Illuminate\Http\Request;

class CartItemsController extends Controller
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
        // Retrieve user_id, product_id and quantity from the request
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Create the cart item
        $cartItem = new CartItems();
        $cartItem->user_id = $user_id;
        $cartItem->product_id = $product_id;
        $cartItem->quantity = $quantity;
        $cartItem->save();

        // Return a response indicating success
        return response()->json([
            'status' => 'success',
            'message' => 'Cart item created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the cart item by ID
        $cartItem = CartItems::findOrFail($id);

        // Return the cart item
        return response()->json([
            'status' => 'success',
            'data' => $cartItem
        ]);
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
        // Retrieve the cart item by ID
        $cartItem = CartItems::findOrFail($id);

        // Update the cart item with the new values
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        // Return a response indicating success
        return response()->json([
            'status' => 'success',
            'message' => 'Cart item updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the cart item by ID and delete it
        $cartItem = CartItems::findOrFail($id);
        $cartItem->delete();

        // Return a response indicating success
        return response()->json([
            'status' => 'success',
            'message' => 'Cart item deleted successfully'
        ]);
    }
}
