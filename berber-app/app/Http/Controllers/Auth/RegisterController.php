<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
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
            'username' => ['required' , 'string', 'max:255'],
            'email' => ['required' , 'string', 'email', 'max:255','unique:customer,email' ],
            'password' => ['required', 'confirmed']
        ]);

        //store user

        Customer::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->passwordvalue)
        ]);

        // sign the user in
        auth()->attempt($request->only('email','password'));



        // redirect
        return redirect()->route('mainPage');
        
    }
}
