<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginIndex(){


        return view('auth.login');
    }




    public function loginStore(Request $request){


        $user = $request->validate([
            'email' => ['required' , 'string', 'email', 'max:255'],
            'password' => ['required']
        ]);

        $v = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if(!Auth::validate($user)){
            return back()->with('error' , 'Email or Password is incorrect');
        }


        return view('admin.new-record');
    }
}
