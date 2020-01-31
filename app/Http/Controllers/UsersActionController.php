<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Advertisementproparty;

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


         $data = Advertisementproparty::where([['city', '=', $city],['price', '<=', $max_price],['room', '>=', $bedrooms],['rentfor', '=', $searching_for],])->get();
        return view('users_search_result')->with(['data'=>$data]);
        //echo $data;
		//echo $city,$max_price,$bedrooms,$searching_for;
        //return view('users_search_result');
    }
	
	
	
}

