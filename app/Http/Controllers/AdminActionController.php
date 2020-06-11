<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Advertisementproparty;
use App\Userbookmark;
use App\Post_Comment;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminActionController extends Controller
{
	//See Pending Post
    public function pending_post()
    {
		$pending = Advertisementproparty::where([['aprove', '=', NULL],])->get();
        //$data = Advertisementproparty::paginate(6);
		
		$pending_count = COUNT($pending);
		$all_post_count = $this->all_admin_data('all_post');
		$user_count = $this->all_admin_data('user');
		$admin_count = $this->all_admin_data('admin');
		if(Auth::user()->admin_ship==1 || Auth::user()->admin_ship==2){
			return view('admin_layouts.pending_post')->with(['pending'=>$pending,'pending_count'=>$pending_count,'all_post_count'=>$all_post_count,'user_count'=>$user_count,'admin_count'=>$admin_count]);
		}
		else{
			return view('home');
		}
    }
	
	
	//Accept Pending Post
    public function accept_pending($id)
    {
		$table = Advertisementproparty::find($id);
		$table->aprove = '1';
        $table->save();
        return redirect()->back();
    }
	
	//See All Post
    public function admin_see_allpost()
    {
		$data = Advertisementproparty::where([['aprove', '=', '1'],])->get();
        //$data = Advertisementproparty::paginate(6);
		
		$pending_count = $this->all_admin_data('pending');
		$all_post_count = COUNT($data);
		$user_count = $this->all_admin_data('user');
		$admin_count = $this->all_admin_data('admin');
        return view('admin_layouts.admin-see-all-post')->with(['data'=>$data,'pending_count'=>$pending_count,'all_post_count'=>$all_post_count,'user_count'=>$user_count,'admin_count'=>$admin_count]);
    }
	
	//See All Users
    public function admin_see_allusers()
    {
		$users = Auth::user()::all();
        //$data = Advertisementproparty::paginate(6);
		
		$pending_count = $this->all_admin_data('pending');
		$all_post_count = $this->all_admin_data('all_post');
		$user_count = COUNT($users);
		$admin_count = $this->all_admin_data('admin');
        return view('admin_layouts.admin-all-users')->with(['users'=>$users,'pending_count'=>$pending_count,'all_post_count'=>$all_post_count,'user_count'=>$user_count,'admin_count'=>$admin_count]);
    }
   
	//Delete User
	public function del_user($id)
    {
		$data = Auth::user()::find($id);
		echo $data->name;
		echo "hfvefurvfu";
		//echo $data;
		
		if($data->avatar!='default.jpg'){
			$file = public_path('assets/img/upload/profile/'.$data->avatar);
				if(file_exists($file)){
					unlink($file);
				}
		}
		$table=Advertisementproparty::where('addid',$data->id)->get();
		foreach ($table as $tables) {
			$users_comment=Post_Comment::where('post_id',$tables->id)->delete();
		}
		$table=Advertisementproparty::where('addid',$data->id)->delete();
		$users_comment=Post_Comment::where('user_id',$data->id)->delete();
		$data->delete();
        return redirect()->back();
    }
   
	//Make Admin
	public function remove_admin($id)
    {
		$table = Auth::user()::find($id);
		$table->admin_ship = '';
        $table->save();
        return redirect()->back();
    }
   
	//Make Admin
	public function make_admin($id)
    {
		$table = Auth::user()::find($id);
		$table->admin_ship = '1';
        $table->save();
        return redirect()->back();
    }
   
	//See All Admin
	public function see_alladmin()
    {
		$admins = Auth::user()::where('admin_ship', '1' )->orWhere('admin_ship', '2' )->get();
        
		$pending_count = $this->all_admin_data('pending');
		$all_post_count = $this->all_admin_data('all_post');
		$user_count = $this->all_admin_data('user');
		$admin_count = COUNT($admins);
        return view('admin_layouts.admin_see_admin')->with(['admins'=>$admins,'pending_count'=>$pending_count,'all_post_count'=>$all_post_count,'user_count'=>$user_count,'admin_count'=>$admin_count]);
    }
	
	/*
    public function countss(){
    	$data = Advertisementproparty::all();
    	$pending = Advertisementproparty::where([['aprove', '=', NULL],])->get();
       // return view('frontView.inc.admin_view_left')->with(['data'=>$data,'pending'=>$pending]);
    	//echo count($data;
    }*/
	
	public function all_admin_data($a)
    {
		$pending = COUNT(Advertisementproparty::where([['aprove', '=', NULL],])->get());
		$all_post = COUNT(Advertisementproparty::where([['aprove', '=', '1'],])->get());
		$users = COUNT(Auth::user()::all());
		$admins = COUNT(Auth::user()::where('admin_ship', '1')->get());
		//$s_admin = COUNT(Auth::user()::where('admin_ship', '2')->get());
		//$admins = $n_admin + $s_admin;
		
		if($a == 'pending'){
			return $pending;
		}
		elseif($a == 'admin'){
			return $admins;
		}
		elseif($a == 'user'){
			return $users;
		}
		elseif($a == 'all_post'){
			return $all_post;
		}
    }
}
