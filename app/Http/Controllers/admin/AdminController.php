<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CartItems;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('admin.all_users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'gender' => 'nullable|integer|min:0|max:2',
            'status' => 'nullable|integer|min:0|max:1',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        
        if(request()->profile_photo_path){
            $imageName = time().rand(1,1000000) .'.'.request()->profile_photo_path->getClientOriginalExtension();
            $img_loc = 'storage/users/';
            request()->profile_photo_path->move($img_loc , $imageName);
            $validatedData['profile_photo_path'] = $imageName;
        }

        $validatedData['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user = User::create($validatedData);
        return redirect()->back()->with('success', 'Saved successfully');
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

        $users = User::find($id);
        return view('admin.edit_users', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
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

        $validatedData['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $users = User::findOrFail($id);
        $users->update($validatedData);
        return redirect()->route('adminUsers.index')->with('success', 'Saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            $users = User::find($id)->delete();
            return redirect()->route('adminUsers.index')->with('success', 'Blog post deleted successfully.');
        }
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

    public function dashboard()
    {
        return view('admin.index');
    }


    //
    public function contact()
    {
        $contact = ContactUs::orderByDesc('created_at')->get();
        return view('admin.contact', compact('contact'));
    }
}
