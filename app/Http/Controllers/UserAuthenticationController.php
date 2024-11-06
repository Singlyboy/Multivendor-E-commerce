<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAuthenticationController extends Controller
{
    public function view_login(){

        return view('backend.LoginForm');
    }


    public function do_login(Request $request)
    {

    //    dd($request->all());

        $credentials=$request->except("_token");

        // dd($credentials);

        $check=Auth::attempt($credentials);

        // dd($check);

        if($check)
        {
            notify()->success("login successful");
            return redirect()->route('deshboard');

        }else{
            notify()->error('Something Went Wrong');
            return redirect()->back();
        }

    }
    public function logout()
    {
          Auth::logout();
          notify()->error("logout successful");

          return redirect()->route('login');
    }

   
}
