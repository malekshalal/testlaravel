<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
       return view('auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);


        $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
            Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
            });
            return back()->with('message', 'We have e-mailed your password reset link!');
    }


    public function showResetPasswordForm($token) { 
        return view('auth.forgetPasswordLink', ['token' => $token]);
     }

     public function submitResetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);


        $updatePassword = DB::table('password_resets')
        ->where([
          'email' => $request->email, 
          'token' => $request->token
        ])
        ->first();

if(!$updatePassword){
return back()->withInput()->with('error', 'Invalid token!');
}

$user = Admin::where('email', $request->email)
->update(['password' => Hash::make($request->password)]);

DB::table('password_resets')->where(['email'=> $request->email])->delete();

return redirect('auth/login')->with('message', 'Your password has been changed!');
     }
     
}
