<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        // $categories = Category::al();
        return view('front.index');
    }

    public function privacy()
    {
        return view('front.privacy');
    }

    public function products()
    {
        return view('front.products');
    }
    
    public function featureProducts()
    {
        return view('front.feature-products');
    }

    public function hotOffers()
    {
        return view('front.hot-offers');
    }

    public function blog()
    {
        return view('front.blog');
    }

    public function contactUs()
    {
        return view('front.contact');
    }

    public function aboutUs()
    {
        return view('front.about');
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
}
