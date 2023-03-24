<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainPageController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
       
        return view('auth.login');
    }

    public function store(Request $request){
        $user = $request->validate([
            'email' => ['required' , 'string', 'email', 'max:255'],
            'password' => ['required']
        ]);

        if(!Auth::validate($user)){
            return back()->with('error' , 'email or password is incorrect');
        }

        $v = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        // auth()->attempt($request->only('email','password'));
        return redirect()->route('mainPage');
    }


    public function logout(){

        if(Auth::user()){
            Auth::logout();
            Session::flush();
        }


        return response()->redirectToRoute('login');

    }
}
