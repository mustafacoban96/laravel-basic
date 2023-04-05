<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\ServeTypes;
use App\Models\User;
use App\Models\Worktime;
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
        return redirect()->route('employeeAppointmentTable',$employee)->with('serves',$serves);
    }

    public function appointmentTable($id){
        $employee = User::where('id',$id)->first();
        
        //dd($employee->name);
        // $workTime = Worktime::all();
        // //dd($workTime[0]->start_time);
        // dd(gettype($workTime));
        // $latest_employees_id = User::where('role' , 2)->latest('id')->first()->id;
        // dd($latest_employees_id);
        
        //dd(count($employees)) number of employees;
        
        $appointments = Appointment::where('employee_id',$id)->get();
        
        //dd($appointments[2]->id);
        //dd($appointments[11]['worktime_id']);
        $worktime = Worktime::all();
        //dd($worktime[11]->start_time);
        
        //dd($appointment[3]->worktime_id);
        // $workTime = Worktime::all();
        // dd($workTime[0]->end_time);
        
        //dd($employee->id);
        

       
        return view('employeeAppointment')->with('employee' , $employee)
                                        ->with('appointments',$appointments)
                                        ->with('worktime',$worktime);
    }

    
}
