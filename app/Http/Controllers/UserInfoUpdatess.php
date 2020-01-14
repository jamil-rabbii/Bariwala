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

    	if(Hash::check($oldpass,$password)){

    		$user=User::find(Auth::id());
    		$user->password=Hash::make($request->password);
    		$user->save();
    		Auth::logout();
    		return Redirect()->route('login')->with('successMez','Your password has been changed,now log in');
    	}else{
    		return Redirect()->back()->with('ErrorMsz','Old password does not match,please try again');
    	}
    }
}
