<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAuthenticationController extends Controller
{
    public function view_login_form(){

        return view('backend.LoginForm');
    }



    public function create_user(Request $request){
        
        //validation
        $validation=Validator::make($request->all(),[
            'user_name'=>'required',
            'email'=>'required|email|unique:email',
            'password'=>'required|min:6|confirmed',
            'user_phone'=>'required|unique:phone'
            
        ]);


        //create

        User::create([

            'name'=>$request->user_name,
            'email'=>$request->user_email,
            'password'=>$request->password,
            'phone'=>$request->user_phone

        ]);
    
    }






   
}
