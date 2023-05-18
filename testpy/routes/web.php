<?php

use App\Http\Controllers\CodeController;
use App\Http\Controllers\PythonCode;
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


Route::get('/testPy', [CodeController::class ,'runScript']);
// Route::get('/runp1',[CodeController::class, 'runPython']);
// Route::get('/cmd', [CodeController::class, 'openCmd']);
// Route::get('/piton',[CodeController::class, 'runpiton']);
// Route::get('/file2',[CodeController::class, 'runFile']);


///////// new Controller


//Route::get('/run' , [NewCodeController::class, 'runCode']);
