<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function subscribe(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:newsletters,email'
        ]);

        $newsletter = new Newsletter;
        $newsletter->email = $request->input('email');
        $newsletter->status = 1;
        $newsletter->save();

        return redirect()->back()->with('success', 'You have successfully subscribed to our newsletter.');
    }




    public function unsubscribe(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email'
        ]);

        $newsletter = Newsletter::where('email', $request->input('email'))->first();

        if (!$newsletter) {
            return redirect()->back()->with('error', 'Email not found in our newsletter list.');
        }

        // Update the status of the subscription to "unsubscribed"
        $newsletter->status = 0;
        $newsletter->save();

        return redirect()->back()->with('success', 'You have successfully unsubscribed from our newsletter.');
    }
}
