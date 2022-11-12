<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function search_supplier(){
        return view ('supplier.search-supplier');
    }
    public function find_supplier(Request $request){
        $this->validate($request,[
            'search'=>'required',
        ]);
        $keyword = $request->input('search');
        $data = Supplier::where('name','like','%'.$keyword.'%')->orWhere('phone','like','%'.$keyword.'%')->orWhere('contact','like','%'.$keyword.'%')->orWhere('address','like','%'.$keyword.'%')->orWhere('description','like','%'.$keyword.'%')->orderBy('name','asc')->get();
        return view('supplier.find-supplier')->with('data',$data);
    }
}
