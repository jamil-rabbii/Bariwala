<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontViewController extends Controller
{
    public function index(){
		return view('frontView.home.home');
	}

}
