<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

    public function createEmployee(){
        
        return view('admin.addEmployee');
        
    }
    
    public function addEmployee(Request $request){
        //validation
        $this->validate($request ,[
            'name' => ['required' , 'string', 'max:255'],
            'email' => ['required' , 'string', 'email', 'max:255','unique:users,email' ],
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
