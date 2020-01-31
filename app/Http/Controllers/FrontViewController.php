<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Advertisementproparty;
use Auth;
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
		$data = Advertisementproparty::where('addid', Auth::user()->id )->get();
		//$data = DB::table('Advertisementproparty')->where('add_id', '1')->get();
        return view('users_own_post')->with(['data'=>$data]);
    }
	
	public function user_search()
    {
        return view('user_search');
    }
	
	public function bookmark()
    {
        return view('bookmark_listing');
    }
    public function all_post()
    {
        $data = Advertisementproparty::all();
        //$data = DB::table('advertisementproparty')->get();
        return view('frontView.home.home')->with(['data'=>$data]);
       // echo $data;
    }

}
