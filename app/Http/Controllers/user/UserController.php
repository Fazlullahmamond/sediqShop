<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CartItems;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        return view('user.index');
    }

    public function index()
    {
        $categories = Category::all();
        $most_viewed = Product::orderBy('views', 'desc')->first();
        $new_product = Product::orderBy('id', 'desc')->first();
        $new_arrivals = Product::orderByDesc('created_at', 'desc')->take(4)->get();
        $feature_products = Product::where('feature', true)->orderByDesc('created_at', 'desc')->take(4)->get();
        $top_subcategories = SubCategory::withCount('products')
            ->orderBy('products_count', 'desc')
            ->take(4)
            ->get();
        $recentProducts = Product::orderByDesc('created_at')->take(4)->get();
        return view('front.user.index', compact(['categories', 'most_viewed', 'new_product', 'top_subcategories', 'feature_products', 'new_arrivals', 'recentProducts']));
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
