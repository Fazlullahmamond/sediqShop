<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserProfileController extends Controller
{
    public function showpage(){
        $users = Auth()->user();
        return view('admin.admin_user_update' , compact('users'));
    }

    public function userupdate(Request $request){

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

    public function passwordUpdate(Request $request){
        $validatedData = $request->validate([
            'oldPassword' => 'required|string',
            'newPassword' => 'required|string|min:6',
            'confirmPassword' => 'required|string|min:6',
        ]);

        $user = Auth()->user();

        if(Hash::check($request->oldPassword, $user->password)){
            if($request->newPassword == $request->confirmPassword){
                $user->update([
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
}