<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Debt;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function staff_debt(){
        return view ('staff.debt');
    }
    public function all_staff_debt(){
        $data = Debt::where('customer_type','=','Staff')->where('balance','>',0)->get();
        return view ('staff.all-debt')->with('data',$data);
    }
    public function single_staff_debt(){
        return view ('staff.search-debt');
    }
    public function search_debt(Request $request){
        $keyword = $request->input('search');
        $data = Sales::where('customer_name','like','%'.$keyword.'%')->where('customer_type','=','Staff')->where('payment_method','=','Debt')->orderBy('customer_name','asc')->get();
        return view ('staff.staff-debt')->with('data',$data);
    }
    public function update_debt(){
        $id=$_REQUEST['id'];
        $data = Debt::where('sales_id','=',$id)->first();
        return view ('staff.update-debt')->with('data',$data);
    }
    public function update_debt2(Request $request)
    {
        //
        $this->validate($request,[
            'poption'=>'required',
            'amount_paid'=>'required',
        ]);
        $id =  $request->input('debt_id');
        if($request->input('poption')=='Full Payment'){
            $data = Debt::find($id);
            $data->part_payment += $request->input('amount_paid');
            $data->balance = 0;
            $data->updated_by = $request->input('user_id');
            $data->save();
            if($data ==true){
                $record = Sales::find($request->input('sales_id'));
                $record->payment_method='Cash';
                $record->save();
                if($record == true){
                    return back()->with('success','Record Updated Successfully');
                }
                else{
                    return back()->with('error','An error has occur while trying to update Sales table');
                }
            }
            else{
                return back()->with('error','An error has occur on the Debt Table');
            }
        }
        else if($request->input('poption')=='Part Payment'){
            $data = Debt::find($id);
            $data->part_payment += $request->input('amount_paid');
            $data->balance -= $request->input('amount_paid');
            $data->updated_by = $request->input('user_id');
            $data->save();
            if($data ==true){
                return back()->with('success','Record Updated Successfully');
            }
            else{
                return back()->with('error','An error has occur on the Debt Table');
            }
        }
        else{
            return back()->with('error','Invalid Transaction');
        }
    }
}
