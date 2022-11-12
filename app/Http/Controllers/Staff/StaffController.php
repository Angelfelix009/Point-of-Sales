<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
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
        $data = Staff::orderBy('name','asc')->paginate(5);
        return view('staff.index')->with('user',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('staff.create');
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
            'sname'=>'required|string|max:255',
            'oname'=>'required|string|max:255',
            'phone'=>'required|max:11',
            'address'=>'required|string|max:255',
            'img'=>'image|max:1200',
        ]);
        //get file name with extension
        $fileNameWithExt=$request->file('img')->getClientOriginalName();
        //get file name
        $filname=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //get extension
        $extension = $request->file('img')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore=$filname.'_'.time().'.'.$extension;
        $data = new Staff();
        $data->name=$request->input('sname').' '. $request->input('oname');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->designation = $request->input('desig');
        $data->img=$fileNameToStore;
        $data->added_by=$request->input('user');
        $data->save();
        if ($data == true){
            $uid=$data->id;
            $path = $request->file('img')->storeAs('public/staff/'.$uid.'/', $fileNameToStore);
            if($path){
                return back()->with('success','Staff Added Successfully');
            }
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
        $data = Staff::find($id);
        return view('staff.edit')->with('data',$data);
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
            'name'=>'required|string|max:255',
            'phone'=>'required|max:11',
            'address'=>'required|string|max:255',
            'img'=>'image|max:1200',
        ]);

        //get file name with extension
        $fileNameWithExt=$request->file('img')->getClientOriginalName();
        //get file name
        $filname=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //get extension
        $extension = $request->file('img')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore=$filname.'_'.time().'.'.$extension;
        $data = Staff::find($id);
        $data->name=$request->input('name');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->designation = $request->input('desig');
        $data->img=$fileNameToStore;
        $data->added_by=$request->input('user');
        $data->save();
        if ($data == true){
            $uid=$data->id;
            $path = $request->file('img')->storeAs('public/staff/'.$uid.'/', $fileNameToStore);
            if($path){
                return back()->with('success','Record Updated Successfully');
            }
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
        $data = Staff::find($id);
        $data->delete();
        return redirect('staff')->with('success','Record Delete Successfully');
    }
}
