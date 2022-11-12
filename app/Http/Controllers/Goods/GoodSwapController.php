<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Stock;
use App\Models\Inventory;
use App\Models\GoodSwap;
use Illuminate\Support\Facades\Auth;
class GoodSwapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return view('goods.swap-good');
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
            'name'=>'required|string|max:255|',
            'new_name'=>'required|string|max:255',
            'tgoods'=>'required|string|max:255',
        ]);
        if($request->input('tgoods')=='Total Swap'){
            $track = Inventory::where('goods_id','=',$request->input('gid'))->first();
            $quantity = $track->quantity;
            $data=new Stock;
            $data->goods_id=$request->input('new_name');
            $data->quantity=$quantity;
            $data->unit=$request->input('unit');
            $data->user=$request->input('user_id');
            $dd=$data->save();
            if ($dd==true){
                $find = Inventory::where('goods_id','=',$request->input('new_name'))->first();
                if($find !=''){
                    $record = Inventory::find($find->id);
                    $record->quantity=$find->quantity + $quantity;
                    $record->unit=$request->input('unit');
                    $record->user=$request->input('user_id');
                    $r = $record->save();
                    if($r == true){
                        $swap = Inventory::find($request->input('gid'));
                        $swap->quantity = 0;
                        $swap->swap_status = 1;
                        $swap->save();
                        if($swap == true){
                            $goods = new GoodSwap;
                            $goods->name=$request->input('name');
                            $goods->new_name=$request->input('new_name');
                            $goods->description=$request->input('description');
                            $goods->price=$request->input('price');
                            $goods->user=$request->input('user_id');
                            $goods->quantity=$quantity;
                            $reg2=$goods->save();
                            if($reg2 == true){
                                //$quan = Inventory::where('goods_id','=',$id)->first();
                                //return view('swap.edit-quantity')->with('data',$quan);
                                return back()->with('success','Goods Swap Successfully');
                            }
                            else{
                                return back()->with('error','In-complete Transaction');
                            }
                        }

                    }
                    else{
                        return back()->with('error','Server Busy');
                    }
                }
                else{
                    $record = new Inventory;
                    $record->goods_id=$request->input('new_name');
                    $record->quantity=$quantity;
                    $record->unit=$request->input('unit');
                    $record->user=$request->input('user_id');
                    $record->swap_status=0;
                    $r = $record->save();
                    if($r == true){
                        $swap = Inventory::find($request->input('gid'));
                        $swap->quantity = 0;
                        $swap->swap_status = 1;
                        $swap->save();
                        if($swap == true){
                            $goods = new GoodSwap;
                            $goods->name=$request->input('name');
                            $goods->new_name=$request->input('new_name');
                            $goods->description=$request->input('description');
                            $goods->price=$request->input('price');
                            $goods->user=$request->input('user_id');
                            $goods->quantity=$quantity;
                            $reg2=$goods->save();
                            if($reg2 == true){
                                return back()->with('success','Goods Swap Successfully');
                            }
                            else{
                                return back()->with('error','In-complete Transaction');
                            }
                        }
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
      else if($request->input('tgoods')=='Partial Swap'){
          $track = Inventory::where('goods_id','=',$request->input('gid'))->first();
          $quantity = $request->input('quantity_goods');
          $data=new Stock;
          $data->goods_id=$request->input('new_name');
          $data->quantity=$quantity;
          $data->unit=$request->input('unit');
          $data->user=$request->input('user_id');
          $dd=$data->save();
          if ($dd==true){
              $find = Inventory::where('goods_id','=',$request->input('new_name'))->first();
              if($find !=''){
                  $record = Inventory::find($find->id);
                  $record->quantity=$find->quantity + $quantity;
                  $record->unit=$request->input('unit');
                  $record->user=$request->input('user_id');
                  $r = $record->save();
                  if($r == true){
                      $swap = Inventory::find($request->input('gid'));
                      $swap->quantity =  $track->quantity - $quantity;
                      $swap->swap_status = 1;
                      $swap->save();
                      if($swap == true){
                          $goods = new GoodSwap;
                          $goods->name=$request->input('name');
                          $goods->new_name=$request->input('new_name');
                          $goods->description=$request->input('description');
                          $goods->price=$request->input('price');
                          $goods->user=$request->input('user_id');
                          $goods->quantity=$quantity;
                          $reg2=$goods->save(); if($reg2 == true){
                              //$quan = Inventory::where('goods_id','=',$id)->first();
                              //return view('swap.edit-quantity')->with('data',$quan);
                              return back()->with('success','Goods Swap Successfully');
                          }
                          else{
                              return back()->with('error','In-complete Transaction');
                          }
                      }
                  }
                  else{
                      return back()->with('error','Server Busy');
                  }
              }
              else{
                  $record = new Inventory;
                  $record->goods_id=$request->input('new_name');
                  $record->quantity=$quantity;
                  $record->unit=$request->input('unit');
                  $record->user=$request->input('user_id');
                  $record->swap_status=0;
                  $r = $record->save();
                  if($r == true){
                      $swap = Inventory::find($request->input('gid'));
                      $swap->quantity = $track->quantity - $quantity;
                      $swap->swap_status = 1;
                      $swap->save();
                      if($swap == true){
                          $goods = new GoodSwap;
                          $goods->name=$request->input('name');
                          $goods->new_name=$request->input('new_name');
                          $goods->description=$request->input('description');
                          $goods->price=$request->input('price');
                          $goods->user=$request->input('user_id');
                          $goods->quantity=$quantity;
                          $reg2=$goods->save();
                          if($reg2 == true){
                              return back()->with('success','Goods Swap Successfully');
                          }
                          else{
                              return back()->with('error','In-complete Transaction');
                          }
                      }
                  }
                  else{
                      return back()->with('error','Server Busy');
                  }
              }
          }
      }
      else{
          return back()->with('error','Invalid Types of swapping selection');
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
        $record=Goods::all();
        $data = Goods::find($id);
        $array=array('data'=>$data,'record'=>$record);
        return view('goods.swap-edit-goods')->with($array);
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
