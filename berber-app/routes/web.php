<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\models\Customer;

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

// Route::get('/logins', function(){

//     // $create = Customer::query()->create([
//     //     'email' => 'test'
//     // ])

//     $customer = Customer::query()->latest()->first();
//     $auth = Auth::guard('csm')->login($customer);
//     dd($auth);
//     dd($customer);

//     $auth = Auth::guard('csm')->attempt([
//         'email' =>'omerkirik@gmail.com',
//         'password' => '123123123'
//     ]);

//     dd($auth);

// })->name('logins');


Route::post('/register' ,[RegisterController::class, 'store']);
Route::get('/mainpage' , [MainPageController::class, 'index'])->name('mainPage')->middleware('auth');
Route::get('/register' ,[RegisterController::class, 'index'])->name('register');
Route::get('/login', [LoginController::class , 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);



