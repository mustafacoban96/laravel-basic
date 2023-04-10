<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\Worktime;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index(){
        $name = Auth::user()->name;
        $appointments = Appointment::where('employee_id',Auth::user()->id)->get();
        //dd($appointments[4]->worktime_id);
        $worktimes = Worktime::all();
        $appointment_status = AppointmentStatus::where('appointment_id',96)->first();
        
        //dd(($appointment_status->serves[0]));
        //dd($appointment_status);
        //dd($worktimes[0]->start_time);
        return view('staff.index')->with('name',$name)
                                    ->with('appointments',$appointments)
                                    ->with('worktime',$worktimes);
    }
}
