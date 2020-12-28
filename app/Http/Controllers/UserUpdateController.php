<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showChangePasswordForm(){
        return view('auth.passwords.changepassword');
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not match with the password you provided.");
        }

        /* I allow the user to input the old password.
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }*/

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password')); //we used the get since the names have a - in them
        $user->save();

        return redirect()->route('controlpanel')->with("success","Password changed successfully !");
    }

    public function showchangeEmailForm(){
        return view('auth.changeemail');
    }
    public function changeEmail(Request $request){
        $validatedData = $request->validate([
            'new-email' => 'required|email|confirmed',
        ]);

        $newemail = $request->get('new-email');
        $user = Auth::user();
        if($newemail != $user->email){
            $user->email = $newemail;
            $user->save();
            return redirect()->route('controlpanel')->with("success","Email changed successfully !");
        }
        else{
            return redirect()->route('controlpanel')->with("infomsg","Email kept the same !");
        }

    }

    public function changeUsername(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
        ]);

        $user = Auth::user();
        $newusername  = $request->username;
        if($newusername != $user->name){
            $user->name = $newusername;
            $user->save();
            return redirect()->route('controlpanel')->with("success","Username changed successfully !");
        }
        else{
            return redirect()->route('controlpanel');
        }
    }
}


