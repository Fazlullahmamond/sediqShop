<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CartItems;
use App\Models\Category;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\State;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Wishlist;
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

    public function historypage()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(5);
        return view('front.user.history', compact(['orders']));
    }

    public function historyDetails($id)
    {
        $order_details = OrderItem::where('order_id', $id)->paginate(5);
        return view('front.user.history-details', compact(['order_details']));
    }

    public function wishlistpage()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->paginate(5);
        return view('front.user.wishlist', compact(['wishlists']));
    }
    public function addToWishlist($id)
    {
        // Use DB transaction to ensure atomicity of database operations
        DB::beginTransaction();
        try {
            $user_id = auth()->user()->id;
            $product_id = $id;

            $wishlist_item = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
            if ($wishlist_item) {
                return redirect()->back()->with('warning', 'Product already exists in wishlist.');
            } else {
                $wishlist_item = new Wishlist([
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                ]);
                $wishlist_item->save();
            }
            DB::commit();
            return redirect()->back()->with('success', 'Product successfully added to wishlist.');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong please try again.');
        }
    }
    public function wishlistRemove($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect()->back()->with('success', 'Product successfully removed from wishlist.');
    }
    public function wishlistAddToCart($id)
    {
        $wishlist = Wishlist::find($id);

        // Use DB transaction to ensure atomicity of database operations
        DB::beginTransaction();
        try {
            $user_id = auth()->user()->id;
            $product_id = $wishlist->product->id;
            $quantity = 1;
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
            $wishlist->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Product successfully added to cart.');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollback();
            return redirect()->back()->with('error', 'something happened please try again.');
        }
    }

    public function cardpage()
    {
        return view('front.user.card');
    }

    public function invoicepage()
    {
        return view('front.user.invoice');
    }

    public function trackorderpage()
    {
        return view('front.user.track-order');
    }

    public function updateAddress(Request $request)
    {
        $user = Auth()->user();

        $validatedData = $request->validate([
            'country_id' => 'required|integer',
            'state_id' => 'required|integer',
            'post_code' => 'required|integer',
            'address_line' => 'required|string',
        ]);

        $user->addresses->update($validatedData);
        return redirect()->back()->with('success', 'User address updated successfully.');
    }


    public function index()
    {
        $countries = Country::all();
        $states = State::all();

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
        return view('front.user.index', compact(['users', 'categories', 'most_viewed', 'new_product', 'top_subcategories', 'feature_products', 'new_arrivals', 'recentProducts', 'countries', 'states']));
    }

    public function profile(Request $request)
    {

        $user = Auth()->user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'gender' => 'nullable|integer|min:0|max:2',
            'status' => 'nullable|integer|min:0|max:1',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if (request()->profile_photo_path) {
            $imageName = time() . rand(1, 1000000) . '.' . request()->profile_photo_path->getClientOriginalExtension();
            $validatedData['profile_photo_path'] = $imageName;
            $img_loc = 'storage/users/';
            request()->profile_photo_path->move($img_loc, $imageName);
        }
        $user->update($validatedData);
        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function userPassword(Request $request)
    {

        $validatedData = $request->validate([
            'oldPassword' => 'required|string',
            'newPassword' => 'required|string|min:6',
            'confirmPassword' => 'required|string|min:6',
        ]);

        $user = Auth()->user();

        if (Hash::check($request->oldPassword, $user->password)) {
            if ($request->newPassword == $request->confirmPassword) {
                $user->Update([
                    'password' => Hash::make($request->newPassword)
                ]);
                return redirect()->back()->with('success', 'Password updated successfully.');
            } else {
                return redirect()->back()->with('error', 'new password and confirm password does not matched..');
            }
        } else {
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
