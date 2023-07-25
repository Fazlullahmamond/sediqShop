<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CartItems;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::where('role', 0)->get();
        return view('admin.all_users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.add_users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
    public function destroy(string $id)
    {
        //
    }

    public function addToCart(Request $request)
    {
        // Use DB transaction to ensure atomicity of database operations
        DB::beginTransaction();
        try {
            $user_id = auth()->user()->id;
            $product_id = $request->input('product_id');
            $quantity = $request->input('quantity');
            // Check if the product already exists in the cart for the user
            $cartItem = CartItems::where('user_id', $user_id)->where('product_id', $product_id)->first();
            if ($cartItem) {
                // If product already exists in cart, update the quantity
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                $cartItem = new CartItems([
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                ]);
                $cartItem->save();
            }
            DB::commit();
            return response()->json(['message' => 'Successfully added to cart'], 200);
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollback();
            return response()->json(['message' => 'Failed to add to cart'], 500);
        }
    }

    public function removeFromCart(Request $request)
    {
        // Use DB transaction to ensure atomicity of database operations
        DB::beginTransaction();
        try {
            $user_id = auth()->user()->id;
            $product_id = $request->input('product_id');
            // Find the cart item for the user and product
            $cartItem = CartItems::where('user_id', $user_id)->where('product_id', $product_id)->first();
            if ($cartItem) {
                $cartItem->delete();
            }

            DB::commit();
            return response()->json(['message' => 'Item removed from cart'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Failed to remove item from cart'], 500);
        }
    }
}
