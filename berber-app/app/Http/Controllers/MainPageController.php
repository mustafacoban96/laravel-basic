<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    
    public function index(){
      
       
        return view('mainPage');
    }



    public function destroy(){

        if(Auth::check()){
            Auth::logout();
            return redirect()->action([RegisterController::class, 'index']);
        }

       

    }
}
