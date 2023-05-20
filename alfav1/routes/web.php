<?php

use App\Http\Controllers\PageController;
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


Route::get('/home' ,[PageController::class, 'homePage'])->name('home');
Route::get('/aboutUs',[PageController::class,'aboutUs'])->name('aboutUs');
Route::get('/contactUs', [PageController::class,'contactUs'])->name('contact');
Route::get('/products', [PageController::class, 'productPage'])->name('products');
Route::get('/products/{product}',[PageController::class, 'productDetail'])->name('product');