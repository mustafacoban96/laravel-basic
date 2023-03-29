<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   
    
    public function index(){
        
        return view('auth.register');
    }

    public function store(Request $request){
        //validation
        $this->validate($request ,[
            'name' => ['required' , 'string', 'max:255'],
            'email' => ['required' , 'string', 'email', 'max:255','unique:users,email' ],
            'password' => ['required', 'confirmed'],
            'phone' => ['required','string','max:255'] // edit this field
        ]);

        //store user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ]);

        // sign the user in
        auth()->attempt($request->only('email','password'));

        // redirect
        return redirect()->route('mainPage');
        
    }

    


    

    



}
