<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CartItems;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        return view('user.index');
    }

    public function index()
    {
        $users = User::FindOrFail(Auth::user()->id);
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
        return view('front.user.index', compact(['users','categories', 'most_viewed', 'new_product', 'top_subcategories', 'feature_products', 'new_arrivals', 'recentProducts']));
    }

    public function profile(Request $request){

        $user = Auth()->user();

        $validatedData=$request->validate([
        'name' => 'required|string|max:50',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'gender' => 'nullable|integer|min:0|max:2',
        'status' => 'nullable|integer|min:0|max:1',
        'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if(request()->profile_photo_path){
            $imageName = time().rand(1,1000000) .'.'.request()->profile_photo_path->getClientOriginalExtension();
            $validatedData['profile_photo_path'] = $imageName;
            $img_loc = 'storage/users/';
            request()->profile_photo_path->move($img_loc , $imageName);
        }
        $user->update($validatedData);
        return redirect()->back()->with('success', 'User updated successfully.');


    }

    public function userPassword(Request $request){

        $validatedData = $request->validate([
            'oldPassword' => 'required|string',
            'newPassword' => 'required|string|min:6',
            'confirmPassword' => 'required|string|min:6',
        ]);

        $user = Auth()->user();

        if(Hash::check($request->oldPassword, $user->password)){
            if($request->newPassword == $request->confirmPassword){
                $user->Update([
                    'password' => Hash::make($request->newPassword)
                ]);
                return redirect()->back()->with('success', 'Password updated successfully.');
            }else{
                return redirect()->back()->with('error', 'new password and confirm password does not matched..');
            }
        }else{
            return redirect()->back()->with('error', 'Old password is not correct.');
        }

        return redirect()->back()->with('success', 'Password not updated successfully.');

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
