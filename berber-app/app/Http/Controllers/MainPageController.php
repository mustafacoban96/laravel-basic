<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    
    public function index(){
      
        $username = Auth::user()->name;
        return view('mainPage')->with('name' , $username);
        
    }

    public function fromMainToEmployeePage(){
        $username = Auth::user()->name;
        $employees = User::where('role',2)->get();
        
        
        return view('employeeMain' ,compact(['username']))->with('employees',$employees);
    }



    

       

    
}
