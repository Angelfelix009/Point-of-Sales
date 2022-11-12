<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Supplier::orderBy('name','asc')->paginate(5);
        return view ('supplier.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('supplier.create');
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
            'name'=>'required|unique:suppliers',
            'address'=>'required',
            'cname'=>'required',
            'phone'=>'required',
            'description'=>'required',
        ]);
        $data = new Supplier;
        $data->name = $request->input('name');
        $data->address = $request->input('address');
        $data->contact = $request->input('cname');
        $data->phone = $request->input('phone');
        $data->description = $request->input('description');
        $data->save();
        if($data == true){
            return back()->with('success','Supplier Added Successfully');
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
        $data = Supplier::find($id);
        return view('supplier.edit')->with('data',$data);
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
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'cname'=>'required',
            'phone'=>'required',
            'description'=>'required',
        ]);
        $data = Supplier::find($id);
        $data->name = $request->input('name');
        $data->address = $request->input('address');
        $data->contact = $request->input('cname');
        $data->phone = $request->input('phone');
        $data->description = $request->input('description');
        $data->save();
        if($data == true){
            return back()->with('success','Supplier Record Updated Successfully');
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
        $data = Supplier::find($id);
        $data->delete();
        return back()->with('success','Record Deleted');
    }
}
