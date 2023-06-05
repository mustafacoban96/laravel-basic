<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SuperAdminController;
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
Route::get('/register',[RegisterController::class , 'registerIndex']);
Route::post('/register',[RegisterController::class ,'regsiterStore'])->name('registerStore');
Route::get('/login' ,[LoginController::class, 'loginIndex'])->name('loginIndex');
Route::post('/login' , [LoginController::class , 'loginStore'])->name('loginStore');
Route::get('/logout' , [LoginController::class, 'logout'])->name('logout');

//admin
Route::middleware(['isAdmin'])->group(function() {
    Route::prefix('admin')->group(function () {
        Route::get('/',[AdminController::class, 'adminIndex'])->name('adminIndex');
        Route::get('/add-personel' ,[AdminController::class, 'addPersonelPage'])->name('addPersonel');
        Route::post('/add-personel',[AdminController::class, 'newPersonelAdd'])->name('newPersonelStore');
        Route::get('/personel/{id}', [AdminController::class, 'showIndividual'])->name('individual');
        Route::put('/personel/{id}' , [AdminController::class, 'updatePersonel'])->name('update');
        Route::get("/personel-list",[AdminController::class,'approvedList'])->name('personelList');
        Route::delete('/delete/{id}', [FileController::class , 'fileDelete'])->name('adminFileDelete');
        Route::get('/download/{id}', [FileController::class , 'fileDownload'])->name('adminFileDownload');
    });
});


//super
Route::middleware(['isSuper'])->group(function(){
    Route::prefix('super')->group(function(){
        Route::get('/', [SuperAdminController::class,'superIndex'])->name('superIndex');
        Route::get('/personel/{id}', [SuperAdminController::class, 'showIndividual'])->name('Superindividual');
        Route::put('/personel/{id}' , [SuperAdminController::class, 'approveOrUpdatePersonel'])->name('updateOrapprove');
        Route::get("/personel-list",[SuperAdminController::class,'approvedList'])->name('superPersonelList');
        Route::delete('/delete/{id}', [FileController::class , 'fileDelete'])->name('superFileDelete');
        Route::get('/download/{id}', [FileController::class , 'fileDownload'])->name('superFileDownload');
       
    });
});
