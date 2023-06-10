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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/{lang?}/home', [PageController::class, 'homePage'])->name('home');
//Route::get('/home' ,[PageController::class, 'homePage'])->name('home');
// Route::get('/aboutUs',[PageController::class,'aboutUs'])->name('aboutUs');
// Route::get('/contactUs', [PageController::class,'contactUs'])->name('contact');
Route::get('/products', [PageController::class, 'productPage'])->name('products');
Route::get('/products/{product}',[PageController::class, 'productDetail'])->name('product');


Route::group(['middleware' => ['web']], function () {
    // Diğer rotalar buraya gelecek

    // Dil değişikliği rotası
    Route::get('locale/{locale}', function ($locale) {
        session(['locale' => $locale]);
        return redirect()->back();
    })->name('locale');

    // Anasayfa
    Route::get('/home',[PageController::class, 'homePage'])->name('home');
    

    // Ürünler
    // Route::get('/products', function () {
    //     return view('products');
    // })->name('products');

    // Hakkımızda
    Route::get('/aboutUs',[PageController::class,'aboutUs'])->name('aboutUs');

    // İletişim
    Route::get('/contactUs', [PageController::class,'contactUs'])->name('contact');
});