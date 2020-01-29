<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\facades\Redirect;

class UserInfoUpdatess extends Controller
{
    public function pass(){
    	return view('auth.passwords.passwordchange');
    }
    public function password_update(Request $request){
    	$password = Auth::user()->password;
    	$oldpass = $request->oldpass;
    	$new_pass = $request->new_password;
    	$confirm_pass = $request->password_confirmation;

    	if(Hash::check($oldpass,$password)){
			if($new_pass==$confirm_pass){
    		$user=User::find(Auth::id());
    		$user->password=Hash::make($new_pass);
    		$user->save();
    		Auth::logout();
    		return Redirect()->route('login')->with('successMez','Your password has been changed,now log in');
			}
			else{
    		return Redirect()->back()->with('ErrorMsz','new password and conferm password does not match,please try again');
			}
    	}else{
    		return Redirect()->back()->with('ErrorMsz','Old password does not match,please try again');
    	}
    }
}
