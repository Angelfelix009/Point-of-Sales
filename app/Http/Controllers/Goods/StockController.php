<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Stock;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $data=Inventory::orderBy('date_purchased','asc')->paginate(10);
       return view('goods.view-stock')->with('data',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $data = Goods::all();
        return view('goods.add-stock')->with('data',$data);
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
            'name'=>'required|string|max:255',
            'quantity'=>'required|max:255',
            'unit'=>'required|string|max:255',
            'date_purchased'=>'required|',
        ]);
        $data=new Stock;
        $data->goods_id=$request->input('name');
        $data->quantity=$request->input('quantity');
        $data->unit=$request->input('unit');
        $data->date_purchased=$request->input('date_purchased');
        $data->user=Auth::user()->id;
        $dd=$data->save();
        if ($dd==true){
            $find = Inventory::where('goods_id','=',$request->input('name'))->first();
            if($find !=''){
                $record = Inventory::find($find->id);
                $record->quantity=$find->quantity + $request->input('quantity');
                $record->unit=$request->input('unit');
                $record->date_purchased=$request->input('date_purchased');
                $record->user=Auth::user()->id;
                $r = $record->save();
                if($r == true){
                    return back()->with('success','Goods Added Successfully');
                }
                else{
                    return back()->with('error','Server Busy');
                }
            }
            else{
                $record = new Inventory;
                $record->goods_id=$request->input('name');
                $record->quantity=$request->input('quantity');
                $record->unit=$request->input('unit');
                $record->date_purchased=$request->input('date_purchased');
                $record->user=Auth::user()->id;
                $record->swap_status=0;
                $r = $record->save();
                if($r == true){
                    return back()->with('success','Goods Added Successfully');
                }
                else{
                    return back()->with('error','Server Busy');
                }
            }

        }
        else{
            return back()->with('error','Server Busy');
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
        $data = Inventory::find($id);
        $count = Stock::where('goods_id','=',$data->goods_id)->orderBy('date_purchased','asc')->paginate(10);
        return view('goods.good-history')->with('data',$count);
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
