<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Worktime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index(){
        
        return view('admin.adminPage');
    }

    public function customerShow(){
        $user_array = User::where('role',0)->paginate(15);
        return view('admin.customterProcess')->with('users',$user_array);
    }


    public function employeeShow(){
        $employee = User::where('role',2)->paginate(15);
        return view('admin.employeeProcess')->with('users',$employee);
    }

    public function showDailyPlan(){
        $appointments = Appointment::all();
        $v = DB::table('appointments')->distinct('employee_id')->get();
        //dd($v);
        // foreach($appointments as $appointment){
        //     dd($appointment->id);
        // }
        
        $employees = User::where('role',2)->get();
        //dd(($employees[7]->name));
        $worktime = Worktime::all();
        //dd($worktime[0]->start_time);
        return view('admin.dailyPlan')->with('employees',$employees)
                                        ->with('worktimes',$worktime)
                                        ->with('appointments',$appointments);
    }

    public function createEmployee(){
        
        return view('admin.addEmployee');
        
    }
    
    public function addEmployee(Request $request,User $user){


        //validation
        $this->validate($request ,[
            'name' => ['required' , 'string', 'max:255'],
            'email' => ['required' , 'string', 'email', 'max:255','unique:users,email'],
            'password' => ['required', 'confirmed'],
            'phone' => ['required','string','max:255'], // edit this field
            
        ]);

        //store user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 2
        ]);

        $newEmployeeID = User::where('role' , 2)->latest('id')->first()->id;
        $user->addWorkTimeToNewEmployee($newEmployeeID);
        
        
        

        return back()->with('success' , 'Employee was added successfully.');
    }

    public function edit($id){
        //dd(User::find($id));
        $user_info = User::where('id',$id)->first();
        return view('admin.updatePage')->with('user',$user_info);
    }

    public function update(Request $request,$id){
        $user = User::find($id);
        
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,'.$user->id,
            'password' =>'sometimes|confirmed',
            'phone' => 'sometimes|string'
        ]);

        if(empty($validated['password'])){
            $validated['password'] = $user->password;
        }
        else{
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated);
        $user->save();

        return back()->with('success' , 'Record was updated succesfully');
    }

    public function destroy($id){
        User::destroy($id);
        return back()->with('success' , 'Record was deleted successfully');
    }

}
