<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/',[App\Http\Controllers\authcontroller::class,'public']);
Route::get('ShowLoginPage',[App\Http\Controllers\authcontroller::class,'ShowLoginPage'])->name('login');
Route::get('AdminLogin',[App\Http\Controllers\authcontroller::class,'adminlogin']);

Route::group(['middleware' => ['auth:admin']], function() {
    Route::get('Dash',[App\Http\Controllers\authcontroller::class,'dashboard'])->name('dashboard');
    Route::get('Adminlogout',[App\Http\Controllers\authcontroller::class,'Adminlogout']);

  });