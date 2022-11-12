<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Track;

class PagesController extends Controller
{
    //
    public function index(){
    	return view('login');
    }
    public function home () {
    	 $tday = date('Y-m-d', strtotime("+90 days"));
        $tdaye=date('Y-m-d');
		$data=  Track::where('expiry_date','<=',$tdaye)->orWhere('expiry_date','<=',$tday)->orderBy('drug_name','asc')->paginate('10');
    	return view('home')->with('record',$data);
    	//return $data;//
	}
}
