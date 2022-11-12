<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Cash;
use App\Models\Debt;
use App\Models\Inventory;
use App\Models\Pos;
use App\Models\SaleOrder;
use App\Models\Sales;
use App\Models\Transfer;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'discount'=>'required',
            'pmethod'=>'required',
        ]);
        if($request->input('discount') == 0){
            $discount = 0;
            $netprice =  $request->input('price');
        }
        else{
            $discount = ($request->input('price')) *($request->input('discount'))/100;
            $netprice =  $request->input('price')-$discount;
        }
        if($request->input('ctype') == 'Customer'){
            $cname = $request->input('cname');
        }
        else{
            $cname = $request->input('sname');
        }
        $data = New Sales();
        $data->user=$request->input('user_id');
        $data->amount = $request->input('price');
        $data->netPrice = $netprice;
        $data->discount = $discount;
        $data->payment_method = $request->input('pmethod');
        $data->sales_invoice = $request->input('sales_invoice');
        $data->customer_type = $request->input('ctype');
        $data->customer_name = $cname;
        $data->save();
        if($data == true){
            $uid = $data->id;
            if($request->input('pmethod') == 'Cash'){
                $cash = new Cash();
                $cash->sales_id=$uid;
                $cash->amount=$netprice;
                $cash->save();
                if ($cash==true){
                    $order = SaleOrder::where('invoice','=',$request->input('sales_invoice'))->get();
                    $record = array('data'=>$data,'sales_order'=>$order);
                    return view('print.sale')->with($record);
                }
            }
            else if($request->input('pmethod') == 'POS'){
                $cash = new Pos();
                $cash->sales_id=$uid;
                $cash->amount=$netprice;
                $cash->save();
                if ($cash==true){
                    $order = SaleOrder::where('invoice','=',$request->input('sales_invoice'))->get();
                    $record = array('data'=>$data,'sales_order'=>$order);
                    return view('print.sale')->with($record);
                }
            }
            else if($request->input('pmethod') == 'Transfer'){
                $cash = new Transfer();
                $cash->sales_id=$uid;
                $cash->amount=$netprice;
                $cash->save();
                if ($cash==true){
                    $order = SaleOrder::where('invoice','=',$request->input('sales_invoice'))->get();
                    $record = array('data'=>$data,'sales_order'=>$order);
                    return view('print.sale')->with($record);
                }
            }
            else if($request->input('pmethod') == 'Debt'){
                $cash = new Debt();
                $cash->sales_id=$uid;
                $cash->amount=$netprice;
                $cash->part_payment=$request->input('part_payment');
                $cash->balance=$netprice - $request->input('part_payment');
                $cash->customer_type = $request->input('ctype');
                $cash->customer_name = $cname;
                $cash->save();
                if ($cash==true){
                    $order = SaleOrder::where('invoice','=',$request->input('sales_invoice'))->get();
                    $record = array('data'=>$data,'sales_order'=>$order, 'debt'=>$cash);
                    return view('print.sale')->with($record);
                }
            }
        }
        else{
            return back()->with('error','Stock can not be updated at the moment');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Sales::find($id);
        $order = SaleOrder::where('invoice','=',$data->sales_invoice)->get();
        $cash = Debt::where('sales_id','=',$data->id)->first();
        $record = array('data'=>$data,'sales_order'=>$order, 'debt'=>$cash);
        return view('print.sale')->with($record);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Sales::find($request->input('sid'));
        if($data->payment_method == 'Cash'){
            $cash = Cash::where ('sales_id','=',$id)->where('amount','=',$data->netPrice)->first();
            $c=$cash->delete();
            if($c==true){
                $sales = SaleOrder::where('invoice','=',$data->sales_invoice)->get();
                foreach($sales as $order){
                    $inve = Inventory::where('goods_id','=',$order->goods_id)->first();
                    $inve->quantity +=$order->quantity;
                    $inve->save();
                    $sale = SaleOrder::where('invoice','=',$data->sales_invoice)->first();
                    $sale->delete();
                }
                $data = Sales::find($id);
                $m=$data->delete();
                if($m==true){
                    return redirect('/search-receipt')->with('success','Record Reverted Successfully');
                }
                else{
                    return redirect('/search-receipt')->with('error','record not deleted completely');
                }
            }
            else{
                return redirect('/search-receipt')->with('error','Process could not start');
            }
        }
        else if($data->payment_method == 'POS'){
            $cash = Pos::where ('sales_id','=',$id)->where('amount','=',$data->netPrice)->first();
            $c=$cash->delete();
            if($c==true){
                $sales = SaleOrder::where('invoice','=',$data->sales_invoice)->get();
                foreach($sales as $order){
                    $inve = Inventory::where('goods_id','=',$order->goods_id)->first();
                    $inve->quantity +=$order->quantity;
                    $inve->save();
                    $sale = SaleOrder::where('invoice','=',$data->sales_invoice)->first();
                    $sale->delete();
                }
                $data = Sales::find($id);
                $m=$data->delete();
                if($m==true){
                    return redirect('/search-receipt')->with('success','Record Reverted Successfully');
                }
                else{
                    return redirect('/search-receipt')->with('error','record not deleted completely');
                }
            }
            else{
                return redirect('/search-receipt')->with('error','Process could not start');
            }
        }
        else if($data->payment_method == 'Transfer'){
            $cash = Transfer::where ('sales_id','=',$id)->where('amount','=',$data->netPrice)->first();
            $c=$cash->delete();
            if($c==true){
                $sales = SaleOrder::where('invoice','=',$data->sales_invoice)->get();
                foreach($sales as $order){
                    $inve = Inventory::where('goods_id','=',$order->goods_id)->first();
                    $inve->quantity +=$order->quantity;
                    $inve->save();
                    $sale = SaleOrder::where('invoice','=',$data->sales_invoice)->first();
                    $sale->delete();
                }
                $data = Sales::find($id);
                $m=$data->delete();
                if($m==true){
                    return redirect('/search-receipt')->with('success','Record Reverted Successfully');
                }
                else{
                    return redirect('/search-receipt')->with('error','record not deleted completely');
                }
            }
            else{
                return redirect('/search-receipt')->with('error','Process could not start');
            }
        }
        else if($data->payment_method == 'Debt'){
            $cash = Debt::where ('sales_id','=',$id)->where('amount','=',$data->netPrice)->first();
            $c=$cash->delete();
            if($c==true){
                $sales = SaleOrder::where('invoice','=',$data->sales_invoice)->get();
                foreach($sales as $order){
                    $inve = Inventory::where('goods_id','=',$order->goods_id)->first();
                    $inve->quantity +=$order->quantity;
                    $inve->save();
                    $sale = SaleOrder::where('invoice','=',$data->sales_invoice)->first();
                    $sale->delete();
                }
                $data = Sales::find($id);
                $m=$data->delete();
                if($m==true){
                    return redirect('/search-receipt')->with('success','Record Reverted Successfully');
                }
                else{
                    return redirect('/search-receipt')->with('error','record not deleted completely');
                }

            }
            else{
                return redirect('/search-receipt')->with('error','Process could not start');
            }
        }
        else{
            return redirect('/search-receipt');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
