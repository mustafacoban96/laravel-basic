<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\models\Customer;
use Illuminate\Support\Facades\App;

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

//
Route::get('/register' ,[RegisterController::class, 'index'])->name('register');
Route::post('/register' ,[RegisterController::class, 'store']);
Route::get('/logout', [LoginController::class , 'logout'])->name('logout');
Route::get('/login', [LoginController::class , 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/mainpage' , [MainPageController::class, 'index'])->name('mainPage')->middleware('auth');
Route::get('/employeeMain' , [MainPageController::class , 'fromMainToEmployeePage'])->name('employeeMainPage');

//Bridge point below

//fromMaintoAppointment
Route::post('/employee' , [AppointmentController::class , 'serveAndEmployeeStore'])->name('serveEmployee');
Route::get('/employee/{id}', [AppointmentController::class , 'appointmentTable'])->name('employeeAppointmentTable');
Route::post('/appointment', [AppointmentController::class, 'madeAppointment'])->name('madeAppointment');
Route::post('/cancelAppointment',[AppointmentController::class , 'appointmentDestroy'])->name('destroyAppointment');


// admin
Route::middleware(['isAdmin'])->group(function() {
   Route::prefix('admin')->group(function () {
    Route::get('/' ,[AdminController::class, 'index'])->name('aindex');
    Route::get('/customerPage',[AdminController::class , 'customerShow'])->name('customerPage');
    Route::get('/delete/{id}',[AdminController::class, 'destroy'])->name('delete');
    Route::get('/edit/{id}' , [AdminController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/employeePage' , [AdminController::class, 'employeeShow'])->name('employeePage');
    Route::get('/employeeCreate', [AdminController::class , 'createEmployee'])->name('employeeCreatePage');
    Route::post('/employeeAdd' , [AdminController::class , 'addEmployee'])->name('addEmploye');
    Route::get('/dailyPlan', [AdminController::class, 'showDailyPlan'])->name('daily');
    Route::post('/cancelAppointment', [AdminController::class, 'deleteAppoinment'])->name('deleteAppointment');
    Route::post('/addedAppointment', [AdminController::class , 'addAppointment'])->name('adminAddAppointment');
   });


});

//Staff
Route::middleware(['isStaff'])->group(function(){
    Route::prefix('staff')->group(function (){
        Route::get('/', [StaffController::class, 'index'])->name('staffIndex');
    });
});






