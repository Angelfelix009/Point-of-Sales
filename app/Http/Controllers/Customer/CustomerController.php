<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Customer::orderBy('name','asc')->paginate(5);
        return view ('customer.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('customer.create');
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
            'name'=>'required|max:255',
            'phone'=>'required|max:11|unique:customers',
        ]);
        $data = New Customer();
        $data->name=$request->input('name');
        $data->phone=$request->input('phone');
        $data->save();
        if ($data == true){
            return back()->with('success','Custommer Added Successfully');
        }
        else{
            return back()->with('error','Server Busy, Try again Later');
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
        //editing of a single record
        $data = Customer::find($id);
        return view ('customer.edit')->with('data',$data);
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
            'name'=>'required|max:255',
            'phone'=>'required|max:11',
        ]);
        $data = Customer::find($id);
        $data->name=$request->input('name');
        $data->phone=$request->input('phone');
        $data->save();
        if ($data == true){
            return back()->with('success','Custommer Record Successfully');
        }
        else{
            return back()->with('error','Server Busy, Try again Later');
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
        $data = Customer::find($id);
        $data->delete();
        return back()->with('success','Record Deleted');
    }
}
