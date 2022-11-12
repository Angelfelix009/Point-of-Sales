<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goods;
use Illuminate\Support\Facades\Auth;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $data=Goods::orderBy('name','asc')->paginate(10);
        return view('goods.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('goods.create');
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
            'name'=>'required|string|max:255|unique:goods',
            'description'=>'required|string|max:255',
            'good_unit'=>'required|string|max:255',
            'price'=>'required|max:255',
        ]);
        $data = new Goods;
        $data->name=$request->input('name');
        $data->description=$request->input('description');
        $data->unit=$request->input('good_unit');
        $data->price=$request->input('price');
        $data->user=Auth::user()->id;
        $reg=$data->save();
        if($reg==true){
            return back()->with('success','Goods Added Successfully');
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
         $data=Goods::find($id);
        return view('goods.edit')->with('data',$data);
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
         $this->validate($request,[
            'description'=>'required|string|max:255',
            'price'=>'required|max:255',
        ]);
        $data = Goods::find($id);
        $data->description=$request->input('description');
        $data->price=$request->input('price');
        $data->user=Auth::user()->id;
        $reg=$data->save();
        if($reg==true){
            return back()->with('success','Record Updated Successfully');
        }
        else{
            return back()->with('error','Server Busy');
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
