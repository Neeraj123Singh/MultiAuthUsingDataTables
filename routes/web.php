<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\User;
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
})->name('login');
Route::get('/register', function () {
    return view('register');
});
Route::get('/adminHome', function () {
    $data = User::all();
    return view('adminHome',['data'=>$data]);
})->middleware('auth:admin')->name('adminHome');
Route::get('/userHome', function () {
    return view('userHome');
})->middleware('auth:web')->name('userHome');
Route::post('/login', [LoginController::class,'login']);
Route::get('/logoutUser', [LoginController::class,'userLogout'])->middleware('auth:web');
Route::get('/logoutAdmin', [LoginController::class,'adminLogout'])->middleware('auth:admin');
Route::post('/register', [RegisterController::class,'handleRegister']);
Route::post('/userList', [LoginController::class,'userList'])->middleware('auth:admin')->name('userList');
