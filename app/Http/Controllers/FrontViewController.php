<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Advertisementproparty;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontViewController extends Controller
{
    public function index(){
		return view('frontView.home.home');
	}
	
	public function add_pro()
    {
        return view('add_property');
    }
	
	public function own_post()
    {
		//$data = Advertisementproparty::where('add_id', '1')->get();
		//$data = DB::table('Advertisementproparty')->where('add_id', '1')->get();
        return view('users_own_post');
    }
	
	public function user_search()
    {
        return view('user_search');
    }
	
	public function bookmark()
    {
        return view('bookmark_listing');
    }
}
