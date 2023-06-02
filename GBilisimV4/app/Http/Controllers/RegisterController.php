<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerIndex(){



        return view('auth.register');
    }




    public function regsiterStore(Request $request){
       
        
            //validation
             $request->validate([
               'firstname' => ['required' , 'string', 'max:255'],
               'lastname' => ['required' , 'string', 'max:255'],
               'email' => ['required' , 'string', 'email', 'max:255','unique:users,email'],
               'password' => ['required', 'confirmed']
           ]);
           
           User::create([
               'firstname' => $request->firstname,
               'lastname' => $request->lastname,
               'email' => $request->email,
               'password' => Hash::make($request->password),
           ]);
           return redirect()->route('loginIndex');
   
       
    }
}
