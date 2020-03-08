<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Advertisementproparty;
use App\Userbookmark;
use App\Post_Comment;
use Auth;

use Illuminate\Http\Request;

class UsersActionController extends Controller
{
    public function save(Request $request){
		$table = new Advertisementproparty();
        $table->title = $request->title;
        $table->propartytype = $request->property_type;
        $table->rentfor = $request->rent_for;
        $table->rentalperiod = $request->rental_period;
        $table->price = $request->price;
        $table->room = $request->room;
        
        $this->validate($request,[
          'featured_image'     => '
             required|image|mimes:jpeg,png,jpg,gif|max:2028'
         ]);
		if ($request->hasFile('featured_image')) {

            $extension = $request->featured_image->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extension;

            $table->featureimg = $filename;

            $request->featured_image->move('assets/img',$filename);
        }
		//numplate
        $this->validate($request,[
          'num_plate'     => '
             required|image|mimes:jpeg,png,jpg,gif|max:2028'
         ]);
		if ($request->hasFile('num_plate')) {

            $extension = $request->num_plate->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extension;

            $table->num_plate = $filename;

            $request->num_plate->move('assets/img/upload',$filename);
        }
		//other img
		
		$other_img=array();
		if($files=$request->file('other_img')){
			foreach($files as $file){
				$original=$file->getClientOriginalName();
				$name =  md5(date('Y-m-d H:i:s'));
				$name = $name.$original.'.'.'jpg';
				$file->move('assets/img/upload/other_img',$name);
				$other_imgs[]=$name;
				
				$table->other_img = implode("|",$other_imgs);
			}
		}
		
        $table->description = $request->description;
        $table->location = $request->location;
        $table->city = $request->city;
        $table->bedroom = $request->bedrooms;
        $table->bathroom = $request->bathrooms;
        $table->parking = $request->parking;
		if($request->extra_facilities != NULL){
		$table->otherfeatures = implode(", ",$request->extra_facilities);
		}
        $table->addid = $request->add_id;
		$table->save();
        return Redirect()->back()->with('insertsuccess',' your request for advertise your house needs admin confirmaion in order to be publish.');
		//return redirect()->to('/');
        //echo $table;
    }
	
	
	public function users_search_result(Request $request)
    {
		$city = $request->city;
		if($request->min_price != NULL){
			$min_price = $request->min_price;
		}
		if($request->max_price != NULL){
			$max_price = $request->max_price;
		}
		if($request->bedrooms != NULL){
			$bedrooms = $request->bedrooms;
		}
		$searching_for = $request->searching_for;


        if($request->min_price == NULL && $request->max_price == NULL && $request->bedrooms == NULL){
			$data = Advertisementproparty::where([['city', '=', $city],['rentfor', '=', $searching_for],['aprove', '=', '1'],['visibility', '=', '1']])->get();
		}
		elseif($request->min_price == NULL && $request->max_price == NULL){
			$data = Advertisementproparty::where([['city', '=', $city],['room', '>=', $bedrooms],['rentfor', '=', $searching_for],['aprove', '=', '1'],['visibility', '=', '1']])->get();
		}
		elseif($request->min_price == NULL && $request->bedrooms == NULL){
			$data = Advertisementproparty::where([['city', '=', $city],['price', '<=', $max_price],['rentfor', '=', $searching_for],['aprove', '=', '1'],['visibility', '=', '1']])->get();
		}
		elseif($request->max_price == NULL && $request->bedrooms == NULL){
			$data = Advertisementproparty::where([['city', '=', $city],['price', '>=', $min_price],['rentfor', '=', $searching_for],['aprove', '=', '1'],['visibility', '=', '1']])->get();
		}
		elseif($request->min_price == NULL){
			$data = Advertisementproparty::where([['city', '=', $city],['price', '<=', $max_price],['room', '>=', $bedrooms],['rentfor', '=', $searching_for],['aprove', '=', '1'],['visibility', '=', '1']])->get();
		}
		elseif($request->max_price == NULL){
			$data = Advertisementproparty::where([['city', '=', $city],['price', '>=', $min_price],['room', '>=', $bedrooms],['rentfor', '=', $searching_for],['aprove', '=', '1'],['visibility', '=', '1']])->get();
		}
		elseif($request->bedrooms == NULL){
		$data = Advertisementproparty::where([['city', '=', $city],['rentfor', '=', $searching_for],['aprove', '=', '1'],['visibility', '=', '1']])
		 ->whereBetween('price', [$min_price, $max_price])->get();
		}
		else{
		$data = Advertisementproparty::where([['city', '=', $city],['room', '>=', $bedrooms],['rentfor', '=', $searching_for],['aprove', '=', '1'],['visibility', '=', '1']])
		 ->whereBetween('price', [$min_price, $max_price])->get();
		}
        //echo $data;
		return view('users_search_result')->with(['data'=>$data]);
        //echo $data;
		//echo $city,$max_price,$bedrooms,$searching_for;
        //return view('users_search_result');
    }
	
	
	//Invisible post
	public function user_invisible_post($id)
    {
		$table = Advertisementproparty::find($id);
		$table->visibility = '0';
        $table->save();
        return redirect()->back();
	}
	
	
	//Visible post
	public function user_visible_post($id)
    {
		$table = Advertisementproparty::find($id);
		$table->visibility = '1';
        $table->save();
        return redirect()->back();
	}
	
	//delete own post
	public function user_del_post($id)
    {
		$data = Advertisementproparty::find($id);
        // previous file delete
            $file = public_path('assets/img/'.$data->featureimg);
            if(file_exists($file)){
                unlink($file);
            }
            // previous file delete
        $data->delete();

        return redirect()->back();
	}
/*
    public function edit_page($id){
        $table = User::find(Auth::id);
        return view('user_info_data')->with(['table' => $table]);
    }
	*/
	public function edituserinfo(Request $request)
    {
          $table = Auth::user()::find((Auth::id()));
          $table->name = $request->username;
          $table->age = $request->age;

            $this->validate($request,[
              'avatar'     => '
                 image|mimes:jpeg,png,jpg,gif|max:2028'
             ]);
              if ($request->hasFile('avatar')) {
                // previous file delete
                    if($table->avatar!='default.jpg'){
						$file = public_path('assets/img/upload/profile/'.$table->avatar);
						if(file_exists($file)){
							unlink($file);
						}
					}
                   
                    // previous file delete
                    $extension = $request->avatar->extension();
                    $filename =  md5(date('Y-m-d H:i:s'));
                    $filename = $filename.'.'.$extension;

                    $table->avatar = $filename;

                    $request->avatar->move('assets/img/upload/profile',$filename);
            }
        $table->gender = $request->gender;

        	$this->validate($request,[
                'phone' => 'size:11|regex:/(01)[0-9]{9}/|not_regex:/[a-z]/'             
            ]);	
        $table->phone = $request->phone;
        $table->save();
        return redirect()->back();

    }
	
	public function user_bookmark_post($id){
		$data = Advertisementproparty::find($id);
		$table = new Userbookmark();
		$table->user_id =  Auth::user()->id;
		$table->ad_post_id = $id;
		$table->title = $data->title;
		$table->location = $data->location;
		$table->price = $data->price;
		$table->featureimg = $data->featureimg;
		$table->save();
		//echo $table;
		return redirect()->back();
	}
	
	public function user_remove_bookmark($id){
		$data = Userbookmark::find($id);
        $data->delete();

        return redirect()->back();
	}
	
	
	public function comment(Request $request){
		$table = new Post_Comment();
		$table->user_id = Auth::user()->id;
		$table->name = Auth::user()->name;
		$table->avatar = Auth::user()->avatar;
		$table->post_id = $request->post_id;
		$table->comment = $request->comment;
		if($request->ref_id != NULL){
		$table->ref_id = $request->ref_id;
		}
		$table->save();
		return redirect()->back();
    }
	
	public function del_comment($id){
		$data = Post_Comment::find($id);
        $data->delete();
		
		$reply_data = Post_Comment::where('ref_id', $id)->get();
		foreach($reply_data as $replies){
			$replies->delete();
		}
		
        return redirect()->back();
	}
	
	public function edit_comment(Request $request){
		$data = new Post_Comment();
		$data = Post_Comment::where('id', $request->comment_id)->get();
		foreach($data as $data){
			$data->comment = $request->comment;
			echo $data;
			$data->save();
		}
		return redirect()->back();
	}
	/*
	public function result(Request  $request)
    {
        $result=\App\Advertisementproparty::where('city', 'LIKE', "%{$request->input('query')}%")->get();
        return response()->json($result);
    }*/
}

