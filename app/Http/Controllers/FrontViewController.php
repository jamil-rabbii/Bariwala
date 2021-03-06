<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Advertisementproparty;
use App\Userbookmark;
use App\Post_Comment;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Database\Schema\Blueprint;

class FrontViewController extends Controller
{
    public function index(){
		//$data = Advertisementproparty::where([['aprove', '=', '1'],])->orderBy('price', 'desc')->paginate(1);
		//$data = Advertisementproparty::where([['aprove', '=', '1'],])->paginate(1)->sortByDesc('price');
    	$data = Advertisementproparty::where([['aprove', '=', '1'],['visibility', '=', '1']])->latest()->paginate(6);
    	$mostview = Advertisementproparty::where([['aprove', '=', '1'],['visibility', '=', '1']])->orderBy('view_count', 'desc')->paginate(6);
		//echo $data;
		return view('frontView.home.home')->with(['data'=>$data,'mostview'=>$mostview]);
	}
	
	//sort
	public function sorted_by($by){
		if($by == 'ltoh'){
			$data = Advertisementproparty::where([['aprove', '=', '1'],])->orderBy('price', 'asc')->paginate(6);
			$mostview = Advertisementproparty::where([['aprove', '=', '1'],])->orderBy('view_count', 'desc')->paginate(6);
		}
		elseif($by == 'htol'){
			$data = Advertisementproparty::where([['aprove', '=', '1'],])->orderBy('price', 'desc')->paginate(6);
			$mostview = Advertisementproparty::where([['aprove', '=', '1'],])->orderBy('view_count', 'desc')->paginate(6);
		}
		else{
			$data = Advertisementproparty::where([['aprove', '=', '1'],])->latest()->paginate(6);
			$mostview = Advertisementproparty::where([['aprove', '=', '1'],])->orderBy('view_count', 'desc')->paginate(6);
		}
		
		return view('frontView.home.home')->with(['data'=>$data,'by'=>$by,'mostview'=>$mostview]);
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
		
		//$data = Advertisementproparty::where([['aprove', '=', '1'],])->get()->sortByDesc('price');
        return view('frontView.home.home')->with(['data'=>$data]);
        //echo $data;
    }
    public function view_post($id){
		$data = Advertisementproparty::where('id', $id )->get();
		$view = Advertisementproparty::where('id', $id )->first();
		$viewcount = 'view_'.$view->id;
		if(!Session::has($viewcount)){
			$view->increment('view_count');
			Session::put($viewcount,1);
		}
		if (Auth::user() != Null){
			$bookmark_data = Userbookmark::where([['user_id', '=', Auth::user()->id],['ad_post_id', '=', $id],])->get();
			if($bookmark_data=='[]'){
				$book = 0;
			}
			else{
				foreach($bookmark_data as $row){
					$book = $row->id;
				}
			}
		}
		else{
			$book = -1;
		}
		
		foreach ($data as $passid)
			$postman = $passid->addid;
			$room_no = $passid->room;
			$rentfor = $passid->rentfor;
			$city = $passid->city;
		$similar_home = Advertisementproparty::where([['city', '=', $city],['room', '>=', $room_no],['rentfor', '=', $rentfor],])->limit(3)->get();
		if (Auth::user() != Null){
		$user_id = Auth::user()::where('id', $postman)->get();
		}
		else{
			$user_id=NULL;
		}
		//$comment = Post_Comment::all();
		$comment = Post_Comment::where('post_id', '=', $passid->id)->get();
		//echo $comment;
        return view('single_home_view')->with(['data'=>$data,'user_id'=>$user_id,'similar_home'=>$similar_home,'book'=>$book,'comment'=>$comment]);
    }

}
