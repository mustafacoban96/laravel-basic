<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\History;
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

    public function staffAddAppointment(Request $request){

        AppointmentStatus::create([
            'appointment_id' => (int)$request->appointmentId[0],
            'customer_id' => Auth::user()->id,
            'status' => 1
        ]);

        return redirect()->back()->with('success','İşleminiz başarıyla tamamlanmıştır.');
    }
    public function staffDeleteAppoinment(Request $request){
        AppointmentStatus::where('appointment_id',$request->appointmentId)->delete();

        return redirect()->back()->with('cancel','Randevuyu başarıyla iptal ettiniz.');
    }


    public function staffRecordAppointment(Request $request){
        $appointment_content = AppointmentStatus::where('appointment_id',$request->appointmentId)->first();
        
        
        //employee id
        $employee = Auth::user()->id;
        //dd($employee);

        // customer_info nullable relate user table
        $customer_info = User::where('id',$appointment_content->customer_id)->first();

        //time string
        $appointment_time_id = Appointment::where('id',$request->appointmentId)->first()->worktime_id;
        $worktime = Worktime::where('id',$appointment_time_id)->first();
        //dd($worktime->start_time);
        
        //serves array or null bunu döngüden al ve if is not null
        $serves = $appointment_content->serves;
        //dd($serves);

        //Create histroy
        History::create([

            'employee_id' => $employee,

            'customer_info' =>[
                $customer_info->role,
                $customer_info->id,
                $customer_info->name,
                $customer_info->phone,
                $customer_info->email,
            ],

            'start_time' => $worktime->start_time,
            'serves' => $serves

        ]);
       
        AppointmentStatus::where('appointment_id',$request->appointmentId)->delete();
        // dd($appointment_content);
        
        // //app id integer
        // dd($appointment_content->appointment_id);
        // //customer name via customer_id appointment_status
        
        return redirect()->back()->with('success','İşleminiz başarıyla tamamlanmıştır.');


        

        

    }
}
