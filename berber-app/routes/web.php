<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Auth\RegisterController;
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


Route::get('/admin', function(){
    return view('posts.index');
});



Route::get('/register' ,[RegisterController::class, 'index'])->name('register');
Route::post('/register' ,[RegisterController::class, 'store']);
Route::get('/mainpage' , [MainPageController::class, 'index'])->name('mainPage');
