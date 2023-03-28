<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index(){
        
        return view('admin.adminPage');
    }




    public function customerShow(){

        

        
        // $user_id = $users->where('role','=',0)[0]['id'];
        // $user_name = $users->where('role','=',0)[0]['name'];
        // $user_email = $users->where('role','=',0)[0]['email'];

        $user_array = User::where('role','=',0)->paginate(14);
        
       
        return view('admin.customterProcess')->with('users',$user_array);
    }

}
