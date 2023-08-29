<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Newsletter;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    //
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
        return view('front.index', compact(['categories', 'most_viewed', 'new_product', 'top_subcategories', 'feature_products', 'new_arrivals']));
    }
    public function privacy()
    {
        return view('front.privacy');
    }
    public function termsCondition()
    {
        return view('front.terms-condition');
    }
    public function discountReturn()
    {
        return view('front.discount-return');
    }

    public function products()
    {
        $products = Product::orderByDesc('created_at')->paginate(8);
        return view('front.products', compact('products'));
    }

    public function featureProducts()
    {
        $products = Product::where('feature', true)->orderByDesc('created_at')->paginate(6);
        return view('front.feature-products', compact('products'));
    }

    public function hotOffers()
    {
        $products = Product::where('hot_offer', true)->orderByDesc('created_at')->paginate(6);
        return view('front.hot-offer-products', compact('products'));
    }

    //return product details page
    public function productDetails($id)
    {
        $categories = Category::all();
        $recent_products = Product::orderByDesc('created_at')->take(4)->get();
        $product = Product::find($id);
        return view('front.productDetails',  compact(['product', 'recent_products', 'categories']));
    }

    public function categoryProducts($id)
    {
        $products = Product::where('sub_category_id', $id)->orderByDesc('created_at')->paginate(8);
        $sub_id = $id;
        return view('front.categoryProducts', compact(['products', 'sub_id']));
    }


    public function blog()
    {
        $blogs = Blog::orderByDesc('created_at')->take(12)->get();
        return view('front.blog', compact('blogs'));
    }

    public function blogDetails($id)
    {
        $blog = Blog::find($id);
        $recent_blogs = Blog::orderByDesc('created_at')->take(6)->get();
        return view('front.blogDetails',  compact(['blog', 'recent_blogs']));
    }

    public function contactUs()
    {
        return view('front.contact');
    }

    public function contactUsStore(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required',
            'comment' => 'required',
            'status' => 'integer',
        ]);

        $contact = ContactUs::create($validatedData);

        session()->flash('success', 'We received your comment/question, we will get back to you soon.');

        return redirect()->back();
    }

    public function faq()
    {
        return view('front.faq');
    }


    public function aboutUs()
    {
        return view('front.about');
    }

    public function policy()
    {
        return view('front.policy');
    }

public function customerService()
    {
        return view('front.customer-service');
    }






    public function storeContactForm(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'nullable|string',
            'comment' => 'required|string',
        ]);

        $contact = new ContactUs();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->comment = $request->comment;
        $contact->status = 1;
        $contact->save();

        return redirect()->back()->with('success', 'Your message has been submitted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'LIKE', "%$query%")->where('user_id', Auth::user()->id)->get();
        return response()->json($products);
    }

    public function searchBlog(Request $request)
    {
        $query = $request->input('query');
        $products = Blog::where('user_id', Auth::user()->id)->where('title', 'LIKE', "%$query%")->get();
        return response()->json($products);
    }


    public function subscribe(Request $request)
    {
        $validatedData = $request->validate([
            'news_email' => 'required|email|unique:newsletters,email',
        ]);


        $newsletter = Newsletter::create([
            'email' => $validatedData['news_email'],
        ]);

        return response()->json([
            'message' => 'You have successfully subscribed to our newsletter!',
        ]);
    }
}
