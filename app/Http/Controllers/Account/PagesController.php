<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Expenditure;
use App\Models\SaleOrder;
use App\Models\Sales;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function _construct(){
        $this->middleware('auth');
    }
    public function add_expenditure(){
        return view ('account.add-expenditure');
    }
    public function post_expenditure(Request $request){
        $this->validate($request,[
            'user_id'=>'required|string',
            'description'=>'required|string',
            'amount'=>'required',
            'date_expenditure'=>'required',
        ]);

        $data = New Expenditure();
        $data->amount=$request->input('amount');
        $data->description=$request->input('description');
        $data->created_by=$request->input('user_id');
        $data->expenditure_date=$request->input('date_expenditure');
        $result = $data->save();
        if($result ==true){
            return back()->with('success','Expenditure added Successfully');
        }
        else{
            return back()->with('error','Server Busy');
        }
    }
    public function view_account(){
        return view ('account.view-account');
    }
    public function find_sales(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $data = Sales::whereDate('created_at', '>=', $start_date)->WhereDate('created_at', '<=', $end_date)->orderBy('created_at', 'asc')->get();
        return view('account.find-sales')->with('data', $data);
    }
    public function single_sales(Request $request){
        $this->validate($request,[
            'start_date'=>'required',
        ]);
        $start_date = $request->input('start_date');

        $data = Sales::whereDate('created_at','=',$start_date)->orderBy('created_at','asc')->get();
        return view('account.find-sales')->with('data',$data);
    }
    public function balance_sheet(){
        $m = date('m');
        $sales = Sales::whereMonth('created_at','=',$m)->get();
        $expenses = Expenditure::whereMonth('expenditure_date','=',$m)->get();
        $data = array(
            'expenses'=>$expenses,
            'sales' =>$sales,
            'date' =>'month of '.date('m-Y'),
        );
        return view ('account.balance-sheet')->with($data);
    }
    public function monthly_account(){
        return view ('account.monthly-account');
    }
    public function check_month(Request $request){
        $this->validate($request,[
            'month' =>'required'
            ,        ]);
        $m = date('m',strtotime($request->input('month')));
        $y = date('Y',strtotime($request->input('month')));
        $sales = Sales::whereMonth('created_at','=',$m)->whereYear('created_at','=',$y)->get();
        $expenses = Expenditure::whereMonth('expenditure_date','=',$m) ->whereYear('created_at','=',$y)->get();
        $data = array(
            'expenses'=>$expenses,
            'sales' =>$sales,
            'date' =>'month of '.$request->input('month'),
        );
        return view ('account.balance-sheet')->with($data);
    }
    public function daily_account(){
        $m = date('d');
        $sales = Sales::whereDay('created_at','=',$m)->get();
        $sales_order = SaleOrder::whereDay('created_at','=',$m)->get();
        $expenses = Expenditure::whereDay('expenditure_date','=',$m)->get();
        $data = array(
            'expenses'=>$expenses,
            'sales' =>$sales,
            'sales_order' =>$sales_order,
            'date' =>'Day '.date('d-m-Y'),
        );
        return view ('account.balance-sheet')->with($data);
    }
    public function yearly_account(){
        return view ('account.yearly-account');
    }
    public function check_year(Request $request){
        $this->validate($request,[
            'month' =>'required'
            ,        ]);
        $y = date('Y',strtotime($request->input('month')));
        $sales = Sales::whereYear('created_at','=',$y)->get();
        $expenses = Expenditure::whereYear('created_at','=',$y)->get();
        $data = array(
            'expenses'=>$expenses,
            'sales' =>$sales,
            'date' => 'year of '.$y,
        );
        return view ('account.balance-sheet')->with($data);
    }
}
