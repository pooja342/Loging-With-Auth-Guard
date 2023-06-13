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


// Route::post('/search', function () {
//   $location = request('location');
//   $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
//       'address' => $location,
//       'key' => 'AIzaSyCXIPyXxfaxrHeB2cCqFsQ790RnwGF59uU', // Replace with your Google Maps API key
//   ]);

//   $results = $response->json()['results'];

//   return view('search', compact('results'));
// })->name('search');

Route::get('/',[App\Http\Controllers\authcontroller::class,'public']);
Route::get('ShowLoginPage',[App\Http\Controllers\authcontroller::class,'ShowLoginPage'])->name('login');
Route::get('AdminLogin',[App\Http\Controllers\authcontroller::class,'adminlogin']);
Route::get('googlemap',[App\Http\Controllers\authcontroller::class,'googlemap']);
Route::get('getresult',[App\Http\Controllers\authcontroller::class,'getresult']);

Route::group(['middleware' => ['auth:admin']], function() {
    Route::get('Dash',[App\Http\Controllers\authcontroller::class,'dashboard'])->name('dashboard');
    Route::get('Adminlogout',[App\Http\Controllers\authcontroller::class,'Adminlogout']);
    Route::get('AddUser',[App\Http\Controllers\UserController::class,'AddUser']);
    Route::post('UserRegister',[App\Http\Controllers\UserController::class,'UserRegister']);
    Route::get('delete/{id}',[App\Http\Controllers\UserController::class,'DeleteUserRecord']);
    Route::get('update/{id}',[App\Http\Controllers\UserController::class,'ShowUpdateForm']);
    Route::post('RecordUpdated',[App\Http\Controllers\UserController::class,'UpdateUserRecord']);
    Route::get('changeStatus',[App\Http\Controllers\UserController::class,'changeStatus']);

  });