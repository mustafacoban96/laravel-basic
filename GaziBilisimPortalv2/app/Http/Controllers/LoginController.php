<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        if(Auth::user()->role == 0){
            return redirect()->route('adminIndex');
        }

        if(Auth::user()->role == 1){
            return redirect()->route('superIndex');
        }

    }


    public function logout(){
        if(Auth::user()){
            Auth::logout();
            Session::flush();
        }


        return response()->redirectToRoute('login');
    }
}
