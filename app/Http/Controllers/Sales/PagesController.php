<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Inventory;
use App\Models\SaleOrder;
use App\Models\Sales;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Customer;
use App\Models\ControlFile;

class PagesController extends Controller
{
    //
    public function reg_sales(){
        $data = '';
        $staff = Staff::all();
        $cust = Customer::all();
        $code = $_REQUEST['ref'];
        $so = array();
        $array=array('data'=>$data,'staff'=>$staff,'cust'=>$cust,'code'=>$code,'so'=>$so);
        return view ('sales.reg-sales')->with($array);
    }
    public function find_product(Request $request){
        $no=0;
        $name = $request->name;
        $ref = $_REQUEST['ref'];
        if($request->ajax())
        {
            $output="";
            $data = Goods::where('name','LIKE','%'.$name."%")->orderBy('name','asc')->limit(10)->get();
            if($data){
                foreach ($data as  $product) {
                    $no+=1;
                    $output.='<tr>'.
                        '<td>'.$no.'</td>'.
                        '<td>'.$product->name.'</td>'.
                        '<td>'.$product->unit.'</td>'.
                        '<td>'.$product->price.'</td>'.
                        '<td><a href="/select-items?id='.$product->id.'&ref='.$ref.'" class="btn btn-primary">Select</a> </td>'.
                        '</tr>';
                }
                return Response($output);
            }
            else{
                $output ='<tr>'.
                    '<td colspan="6">No Output'.$ref.' - '.$data.'</td>'.
                    '</tr>';
                return Response($output);
            }

        }

    }
    public function select_items(){
        $id=$_REQUEST['id'];
        $ref=$_REQUEST['ref'];
        $good = Goods::find($id);
        $staff = Staff::all();
        $cust = Customer::all();
        $code = $_REQUEST['ref'];
        $so = array();
        $array=array('data'=>$good->name,'staff'=>$staff,'cust'=>$cust,'code'=>$code,'so'=>$so);
        return view ('sales.reg-sales')->with($array);
    }
    public function add_sales(Request $request)
    {
        //validate the form-input and return an error message when it encounter one
        $this->validate($request,[
            'name'=>'required|string',
            'quantity'=>'required',
            'user_id'=>'required',
            'ref'=>'required',
        ]);
        $goods = Goods::where('name','=',$request->input('name'))->first();
        $gid = $goods->id;
        $find = Inventory::where('goods_id','=',$gid)->where('quantity','>=',$request->input('quantity'))->first();
        if($find !='') {
            $name=$request->input('name');
            $quantity=$request->input('quantity');
            $goods = Goods::where('name','=',$name)->first();
            $data = new SaleOrder();
            $data->goods_id=$gid;
            $data->user=$request->input('user_id');
            $data->goods_name=$goods->name;
            $data->invoice=$request->input('ref');
            $data->quantity=$quantity;
            $data->unit_price = $goods->price;
            $data->amount = $goods->price * $quantity;
            $data->save();
            if($data ==true){
                $stock = Inventory::where('goods_id','=',$goods->id)->first();
                $stock->quantity = $stock->quantity - $quantity;
                $stock->save();
                if($stock == true){
                    $so = SaleOrder::where('invoice','=',$request->input('ref'))->get();
                    $data = $request->input('name');
                    $staff = Staff::all();
                    $cust = Customer::all();
                    $code = $request->input('ref');
                    $array=array('data'=>$data,'staff'=>$staff,'cust'=>$cust,'code'=>$code,'so'=>$so);
                    return redirect ('/reg-sales2?ref='.$code.'&data1='.$data)->with($array);
                }
            }
        }
        else{
            $so = SaleOrder::where('invoice','=',$request->input('ref'))->get();
            $data = $request->input('name');
            $staff = Staff::all();
            $cust = Customer::all();
            $code = $request->input('ref');
            $array=array('data'=>$data,'staff'=>$staff,'cust'=>$cust,'code'=>$code,'so'=>$so,'error'=>'Low Cost for that particular good');
            return  redirect ('/reg-sales2?ref='.$code.'&data1='.$data)->with($array);
        }
    }
    public function reg_sales2(){
        $staff = Staff::all();
        $cust = Customer::all();
        $code = $_REQUEST['ref'];
        $data = $_REQUEST['data1'];
        $so = SaleOrder::where('invoice','=',$code)->get();
        $array=array('data'=>$data,'staff'=>$staff,'cust'=>$cust,'code'=>$code,'so'=>$so);
        return view ('sales.reg-sales')->with($array);
    }
    public function delete_item()
    {
        $id = $_REQUEST['id'];
        $d = SaleOrder::find($id);
        $staff = Staff::all();
        $cust = Customer::all();
        $code = $d->invoice;
        $p=$d->goods_name;
        $data = SaleOrder::find($id);
        $data->delete();
        if($data == true) {
            $stock = Inventory::where('goods_id', '=', $d->goods_id)->first();
            $stock->quantity = $stock->quantity + $d->quantity;
            $stock->save();
            if($stock==true){
                $so = SaleOrder::where('invoice', '=', $code)->get();
                $array = array('data' => $p, 'staff' => $staff, 'cust' => $cust, 'code' => $code, 'so' => $so);
                return  redirect ('/reg-sales2?ref='.$code.'&data1='.$p)->with($array);
            }
        }
    }
    public function search_receipt(){
        return view ('print.search-receipt');
    }
    public function receipt_find(Request $request){
        $id=$request->input('search');
        $data =Sales::where('sales_invoice','like','%'.$id.'%')->orWhere('created_at','like','%'.$id.'%')->orderBy('sales_invoice','asc')->get();
        return view('print.search-result')->with('data',$data);
    }
    public function all_debt(){
        $data = Debt::where('balance','>',0)->get();
        return view ('account.all-debt')->with('data',$data);
    }
}
