<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\otpMail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //

    public function registration(Request $request)
    {

       //step1 validation
        $validation=Validator::make($request->all(),[
            'customer_name'=>'required',
            'email'=>'required||email:rfc,dns',
            'password'=>'required|min:6|confirmed',
            'mobile_number'=>'required|digits:11|numeric'

            
        ]);

        if($validation->fails())
        {
            notify()->error($validation->getMessageBag());
            return redirect()->back();
        }

    $otp = rand(100000,999999);

         $customer = Customer::create([
        
        'name'=>$request->customer_name,
        'email'=>$request->email,
        'otp_expired_at'=>now()->addMinutes(3),
        'password'=>bcrypt($request->password),
        'mobile'=>$request->mobile_number,
        'otp'=>$otp
       ]);

      // $customer = $request->email;
       
      // $emailCustomerDetials = $request->customer_name;
       
       Mail::to($request->email)->send(new otpMail ($customer));
       notify()->success('Customer Registration Successful.');

       return view('frontend.pages.otp',compact('customer'));



    }

    public function customerLogin(Request $request)
    {

      
       //dd($request->all());
       //step1 validation
       $validation=Validator::make($request->all(),[
        'email'=>'required|email',
        'password'=>'required|min:6',
        ]);

    if($validation->fails())
    {
        notify()->error($validation->getMessageBag());
       
        return redirect()->back();
    }

   
       //condition for login
        $credentials=$request->except('_token');
       
       $check=auth('customerGuard')->attempt($credentials);
    

       if($check ){
        $customer=auth('customerGuard')->user();

        if($customer->is_email_verified==true)
        {
            notify()->success('Login Success');
       
            return redirect()->route('home');
        }else{
            auth('customerGuard')->logout();
            notify()->error('Account Not verified');
            return redirect()->route('frontend.pages.otp');
        }
        
       }else
       {
        notify()->error('Login failed.');

        return redirect()->route('home');
       }
    }
    public function customerLogout()
    {
    
        Auth::guard('customerGuard')->logout();
        session()->forget('basket');  
        notify()->success('logout!');     
      
  
        return redirect()->route('home');
  } 
   
}

