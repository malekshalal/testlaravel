<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
  public function index(){
      return view('auth.login');
  }
  public function register(){
    return view('auth.register');
  }
 function save(Request $request){
    $request->validate([
      'name'=>'required',
      'email'=>'required|email|unique:admins',
      'password'=>'required|min:6|max:25',

    ]);
    $admin=new Admin();
    $admin->name=$request->name;
    $admin->email=$request->email;
    $admin->password=Hash::make($request->password);
    $save=$admin->save();
    if($save){
      return back()->with('success','New User has been successuly added to database');
    }else{
      return back()->with('fail','Something went Wrong , try again later');

    }

  }

//check
function check(Request $request){

  $request->validate([
    
    'email'=>'required|email',
    'password'=>'required|min:6|max:25',
  ]);


  $userInfo=Admin::where('email','=',$request->email)->first();
  if(!$userInfo){
    return back()->with('fail','We do not recognize your email address');
  }else{
   
    if (Hash::check($request->password,$userInfo->password)){
      $request->session()->put('LoggedUser',$userInfo->id);
      return redirect('admin/dashboard');

    }else{
      return back()->with('fail','Incorrect password');
    }
  }
}


function logout(){
  if(session()->has('LoggedUser')){
    session()->pull('LoggedUser');
    return redirect('auth.login');
  }
}

function dashboard(){
  $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
  return view("admin.dashboard",$data);
}




  
}
