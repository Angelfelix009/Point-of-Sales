<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth');
    }
    public function change_password(){
    	return view ('user.change-password');
    }
    public function change_password_submit(Request $request){
    		$this->validate($request,[
           'oldpassword'=>'required|string|min:6',
            'password'=>'required|string|min:6|confirmed',
        ]);
    		$id=Auth::user()->id;
        $password = Auth::user()->password;
        if(Hash::check($request['oldpassword'], $password)){
            $user=User::find($id);
            $user->password =Hash::make($request['password']);
            $data = $user->save();
            if($data==true){
                return back ()->with('success','Password Changed Successfully');
            }
        }
        else{
            return back()->with('error','Please enter correct current password');
        }
    }
}
