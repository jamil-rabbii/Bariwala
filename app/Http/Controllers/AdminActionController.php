<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Advertisementproparty;
use App\Userbookmark;
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
		if(Auth::user()->admin_ship==1){
			return view('admin_layouts.pending_post')->with(['pending'=>$pending]);
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
        return view('admin_layouts.admin-see-all-post')->with(['data'=>$data]);
    }
	
	//See All Users
    public function admin_see_allusers()
    {
		$users = Auth::user()::all();
		//echo $users;
        //$data = Advertisementproparty::paginate(6);
        return view('admin_layouts.admin-all-users')->with(['users'=>$users]);
    }
   
	//Delete User
	public function del_user($id)
    {
		$table = Auth::user()::find($id);
		echo $table->name;
		
		if($table->avatar!='default.jpg'){
			$file = public_path('assets/img/upload/profile/'.$table->avatar);
				if(file_exists($file)){
					unlink($file);
				}
		}
		
		$table->delete();
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
		$admins = Auth::user()::where('admin_ship', '1' )->get();
        
        return view('admin_layouts.admin_see_admin')->with(['admins'=>$admins]);
    }
 /*
    public function countss(){
    	$data = Advertisementproparty::all();
    	$pending = Advertisementproparty::where([['aprove', '=', NULL],])->get();
       // return view('frontView.inc.admin_view_left')->with(['data'=>$data,'pending'=>$pending]);
    	//echo count($data;
    }*/
}
