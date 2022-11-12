<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Sales;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function search_customer(){
        return view ('customer.search-customer');
    }
    public function find_customer(Request $request){
        $this->validate($request,[
            'search'=>'required',
        ]);
        $keyword = $request->input('search');
        $data = Customer::where('name','like','%'.$keyword.'%')->orWhere('phone','like','%'.$keyword.'%')->orderBy('name','asc')->get();
        return view('customer.find-customer')->with('data',$data);
    }
    public function customer_debt(){
        return view ('customer.debt');
    }
    public function all_customer_debt(){
        $data = Debt::where('customer_type','=','Customer')->where('balance','>',0)->get();
        return view ('customer.all-debt')->with('data',$data);
    }
    public function single_customer_debt(){
        return view ('customer.');
    }
    public function search_debt2(Request $request){
        $keyword = $request->input('search');
        $data = Sales::where('customer_name','like','%'.$keyword.'%')->where('customer_type','=','Customer')->where('payment_method','=','Debt')->orderBy('customer_name','asc')->get();
        return view ('customer.customer-debt')->with('data',$data);
    }
}
