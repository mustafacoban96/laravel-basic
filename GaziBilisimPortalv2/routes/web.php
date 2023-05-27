<?php

use App\Http\Controllers\AdminController;
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
Route::get('/register',[RegisterController::class, 'registerIndex']);
Route::post('/register' , [RegisterController::class, 'registerStore'])->name('register');
Route::get('/login' , [LoginController::class, 'loginIndex']);
Route::post('/login' , [LoginController::class, 'loginStore'])->name('login');
Route::get('/logout' , [LoginController::class, 'logout'])->name('logout');


//admin
Route::middleware(['isAdmin'])->group(function() {
    Route::prefix('admin')->group(function () {
        Route::get('/',[AdminController::class, 'index'])->name('adminIndex');
        Route::get('/PersonelList',[AdminController::class, 'personelShow'])->name('personel-listesi');
        Route::get('/PersonelEkle',[AdminController::class, 'personelAddIndex'])->name('perEkleIndex');
        Route::post('/PersonelEkle',[AdminController::class, 'personelStore'])->name('perEkle');
    });
});

