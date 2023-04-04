<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function serveAndEmployeeStore(Request $request){

        $employee = (int)$request->input('employee');
        $serves = $request->input('serves');
        $customer = Auth::user();

        // will be edit this func!!!!!!!!!!!!!!!!!!!!!!!
        return redirect()->route('employeeAppointmentTable',$employee);
    }

    public function appointmentTable($id){
        $employee = User::where('id',$id)->first();

        $employees = User::where('role' , 2)->lists('id');
        dd($employees);
        
        //dd(count($employees)) number of employees;
        dd($employee->id);
        
        return view('employeeAppointment')->with('employee' , $employee);
    }

    
}
