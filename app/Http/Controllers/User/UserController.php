<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Models\Role;
class UserController extends Controller
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
        $data = User::orderBy('name','asc')->paginate(10);
        return view('user.index')->with('user',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sname'=>'required|string|max:255',
            'oname'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:6|confirmed',
            'img'=>'image|max:1200',
            'level'=>'required|string|max:255',
        ]);
        if($request->input('level')=='DataInput'){
            $role_id = 1;
        }
        elseif($request->input('level')=='Supervisor'){
            $role_id = 2;
        }
        elseif($request->input('level')=='Manager'){
            $role_id = 3;
        }
        elseif($request->input('level')=='Admin'){
            $role_id = 4;
        }
        else{
            return back()->with('error','Invalid Access Level');
        }
        //get file name with extension
        $fileNameWithExt=$request->file('img')->getClientOriginalName();
        //get file name
        $filname=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //get extension
        $extension = $request->file('img')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore=$filname.'_'.time().'.'.$extension;
        $data = new User;
        $data->name=$request->input('sname') .' ' . $request->input('oname');
        $data->role_id=$role_id;
        $data->email=$request->input('email');
        $data->profile_photo_path=$fileNameToStore;
        $data->password=bcrypt( $request->input('password'));
        $data->save();

        if($data == true){
            $role_superAdmin=Role::where('name','=',$request->input('level'))->first();
            $data->roles()->attach($role_superAdmin);
            $uid=$data->id;
            $path = $request->file('img')->storeAs('public/avarter/'.$uid.'/', $fileNameToStore);
            if($path){
                return back()->with('success','User account created successfully');
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
         $data = User::find($id);
        return view('user.edit')->with('data',$data);
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
            'level'=>'required|string|max:255',
        ]);
        if($request->input('level')=='DataInput'){
            $role_id = 1;
        }
        elseif($request->input('level')=='Supervisor'){
            $role_id = 2;
        }
        elseif($request->input('level')=='Manager'){
            $role_id = 3;
        }
        elseif($request->input('level')=='Admin'){
            $role_id = 4;
        }
        else{
            return view('login');
        }
        $user = User::find($id);
        $user->roles()->detach();
        $user->name=$request->input('name');
        $user->role_id=$role_id;
        $user->save();
        $role_superAdmin=Role::where('name','=',$request->input('level'))->first();
        $user->roles()->attach($role_superAdmin);
        return redirect()->to('/user')->with('success','Account Updated successfully');
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
         $data = User::find($id);
        $data->roles()->detach();
        $data->delete();
        return redirect('/user')->with('success','Account Delete Successfully');
    }
}
