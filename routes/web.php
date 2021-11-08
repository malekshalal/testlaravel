<?php

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
Route::get('auth/login',[MainController::class,'index'])->name('auth.login');
Route::get('auth/register',[MainController::class,'register'])->name('auth.register') ;
Route::post('auth/save',[MainController::class,'save'])->name('auth.save');
Route::post('auth/check',[MainController::class,'check'])->name('auth.check');
Route::get('admin/dashboard',[MainController::class,'dashboard'])->name('admin.dashboard');




























//Route::any('{query}',function() { return redirect('/'); })->where('query', '.*');
