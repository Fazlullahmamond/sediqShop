<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
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
