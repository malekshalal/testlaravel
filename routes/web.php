<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::post('auth/save',[MainController::class,'save'])->name('auth.save');
Route::post('auth/check',[MainController::class,'check'])->name('auth.check');
Route::get('auth/logout',[MainController::class,'logout'])->name('auth.logout');

  
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::group(['middleware'=>['AuthCheck']],function(){
    Route::get('auth/login',[MainController::class,'index'])->name('auth.login');
    Route::get('auth/register',[MainController::class,'register'])->name('auth.register') ;
    Route::get('admin/dashboard',[MainController::class,'dashboard'])->name('admin.dashboard');

});

/* Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login',[MainController::class, 'index'])->name('auth.login');
    Route::get('/auth/register',[MainController::class, 'register'])->name('auth.register');

    Route::get('/admin/dashboard',[MainController::class, 'dashboard']);
    
}); */



























//Route::any('{query}',function() { return redirect('/'); })->where('query', '.*');
