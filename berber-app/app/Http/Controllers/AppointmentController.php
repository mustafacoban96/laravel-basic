<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\ServeTypes;
use App\Models\User;
use App\Models\Worktime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    public function serveAndEmployeeStore(Request $request){

        $employee = (int)$request->input('employee');
        $serves = $request->input('serves');
       
        // will be edit this func!!!!!!!!!!!!!!!!!!!!!!!
        return redirect()->route('employeeAppointmentTable',$employee);
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
        
        $serveTypes = ServeTypes::all();
        

         ///current hour
        $current_time = Carbon::now();
       
       
        return view('employeeAppointment')->with('employee' , $employee)
                                        ->with('appointments',$appointments)
                                        ->with('worktime',$worktime)
                                        ->with('serveTypes',$serveTypes)
                                        ->with('current_time',$current_time);
    }



    public function madeAppointment(Request $request){

        // appoinmentID
        $appointmentID = $request->input('appointmentID');
        //dd(gettype((int)$appointmentID));

        //customerID
        //$customerID = Auth::user()->id;
        
       
        //dd(User::find($customerID));
        
        // $current_hour = Carbon::now();
        
        // $start_time = Carbon::parse('15:09:05');
        

        // $diffInMinutes = $current_hour->diffInMinutes($start_time);
        // dd(gettype($diffInMinutes));
        // // //validate
        
        $serves = $request->input('serves');
        // dd($serves);



       
        
        // if return null from modal
        if(empty($serves)){
            return redirect()->back()->withErrors(['error' => 'Işleminiz tamamlanmadı lutfen hizmet tipi seçiniz']);
        }

        //if customer has already made appointment 
        if(AppointmentStatus::where('customer_id',Auth::user()->id)->exists()){
            return redirect()->back()->withErrors(['error' => 'Size ait randevu mevcuttur.Lutfen guncelleme yapınız.']);
        }
        
        
        
        

        
        AppointmentStatus::create([
            'appointment_id' => (int)$request->input('appointmentID'),
            'customer_id' => Auth::user()->id,
            'status' => 1
        ]);

        

        return redirect()->back()->with('success','İşleminiz başarıyla tammamlanmıştır.');
    }

    
    
}
