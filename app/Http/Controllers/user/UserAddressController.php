<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        return view('user.addresses.index', compact('user', 'addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $countries = Country::all();
        return view('user.addresses.create', compact('user', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $address = new Address();
        $address->address_line = $request->input('address_line');
        $address->post_code = $request->input('post_code');
        $address->state_id = $request->input('state_id');
        $address->user_id = $user->id;
        $address->save();
        return redirect()->route('user.addresses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $countries = Country::all();
        $address = Address::find($id);
        return view('user.addresses.edit', compact('user', 'address', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $address = Address::find($id);
        $address->address_line = $request->input('address_line');
        $address->post_code = $request->input('post_code');
        $address->state_id = $request->input('state_id');
        $address->save();
        return redirect()->route('user.addresses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect()->route('user.addresses.index');
    }
}
