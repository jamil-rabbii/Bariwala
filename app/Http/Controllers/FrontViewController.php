<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Advertisementproparty;
use App\Userbookmark;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Database\Schema\Blueprint;

class FrontViewController extends Controller
{
    public function index(){
		return view('frontView.home.home')->with(['data'=>$data]);
	}
	
	public function users_info()
    {
        return view('user_info_data');
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
		$data = Userbookmark::where('user_id', Auth::user()->id )->get();
        return view('bookmark_listing')->with(['data'=>$data]);
    }
    public function all_post()
    {
    	$data = Advertisementproparty::where([['aprove', '=', '1'],])->latest()->paginate(6);
		//$data = Advertisementproparty::paginate(6);
        return view('frontView.home.home')->with(['data'=>$data]);
       // echo $data;
    }
    public function view_post($id)
    {
		$data = Advertisementproparty::where('id', $id )->get();
		$view = Advertisementproparty::where('id', $id )->first();
		$viewcount = 'view_'.$view->id;
		if(!Session::has($viewcount)){
			$view->increment('view_count');
			Session::put($viewcount,1);
		}
		$bookmark_data = Userbookmark::where([['user_id', '=', Auth::user()->id],['ad_post_id', '=', $id],])->get();
		if($bookmark_data=='[]'){
			$book = 0;
		}
		else{
			foreach($bookmark_data as $row){
				$book = $row->id;
			}
		}
		foreach ($data as $passid)
			$postman = $passid->addid;
			$room_no = $passid->room;
			$rentfor = $passid->rentfor;
			$city = $passid->city;
		$user_id = Auth::user()::where('id', $postman)->get();
		$similar_home = Advertisementproparty::where([['city', '=', $city],['room', '>=', $room_no],['rentfor', '=', $rentfor],])->limit(3)->get();
			//echo $similar_home;
        return view('single_home_view')->with(['data'=>$data,'user_id'=>$user_id,'similar_home'=>$similar_home,'book'=>$book]);
    }

}
