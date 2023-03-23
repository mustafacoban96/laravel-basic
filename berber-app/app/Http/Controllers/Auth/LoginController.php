<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
       
        return view('auth.login');
    }




    public function store(Request $request){
        $user = $request->validate([
            'email' => ['required' , 'string', 'email', 'max:255','exists:users,email'],
            'password' => ['required']
        ]);

        dd(Auth::validate($user));
        
        
    }
}
