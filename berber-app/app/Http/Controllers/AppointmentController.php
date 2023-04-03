<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        return view('employeeAppointment')->with('employee' , $employee);
    }

    
}
