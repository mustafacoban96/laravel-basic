<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    
    public function index(){
      
        $username = Auth::user()->name;
        return view('mainPage')->with('name' , $username);
    }



    

       

    
}
