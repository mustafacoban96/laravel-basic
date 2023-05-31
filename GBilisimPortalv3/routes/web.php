<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});





//Register - Login

Route::get('/register', [RegisterController::class, 'registerIndex']);
Route::post('/register' , [RegisterController::class , 'registerStore'])->name('register-record');
Route::get('/login' , [LoginController::class, 'loginIndex'])->name('loginIndex');
Route::post('/login', [LoginController::class, 'loginStore'])->name('login');


