<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Advertisementproparty;
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
        $table->otherfeatures = implode(", ",$request->extra_facilities);
        $table->addid = $request->add_id;
		$table->save();
        return Redirect()->back()->with('insertsuccess',' your advertisement for rent house has been successfully posted');
		//return redirect()->to('/');
        //echo $table;
    }
	
	
	public function users_search_result(Request $request)
    {
		$city = $request->city;
		$max_price = $request->max_price;
		$bedrooms = $request->bedrooms;
		$searching_for = $request->searching_for;


         $data = Advertisementproparty::where([['city', '=', $city],['price', '<=', $max_price],['room', '>=', $bedrooms],['rentfor', '=', $searching_for],['aprove', '=', '1']])->get();
        return view('users_search_result')->with(['data'=>$data]);
        //echo $data;
		//echo $city,$max_price,$bedrooms,$searching_for;
        //return view('users_search_result');
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
        $table->save();
        return redirect()->back();

    }
}

