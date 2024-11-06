<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Part;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
       
        return view("frontend.home");    
    }
    public function otpPage()
    {
        
        return view('frontend.pages.otp');

    }
     
    public function otpSubmit(Request $request)

    {
        $otp = $request->a.$request->b.$request->c.$request->d.$request->e.$request->f; 

        $checkotp = Customer::where('email',$request->email)
                    ->where('otp',$otp)
                    ->first();
        $customer=Customer::where('email',$request->email)->first();
        
        if($checkotp){

            if(strtotime($checkotp->otp_expired_at) > strtotime(now()))

            {
                $checkotp->update([
                    'is_email_verified'=>true,
                    'otp'=>null,
                    'otp_expired_at'=>null
                ]);

                notify()->success('Account Verified');
                return redirect()->route('home');

            }

        else{

     
         notify()->error('OTP expired. Please re-send OTP.');
         return view('frontend.pages.otp',compact('customer'));
        }
           
        } else
        {
            notify()->error('Invalid OTP or email.');

            return view('frontend.pages.otp',compact('customer'));

        }


    }

    public function otpResend($email)
    {

        $customer=Customer::where('email',$email)->first();

        if($customer)
        {
            $otp=rand(100000,999999);

            $customer->update([
                'otp'=>$otp,
                'otp_expired_at'=>now()->addMinutes(3),
            ]);
          
            notify()->success('Resend success');
            return view('frontend.pages.otp',compact('customer'));
        }
        
    }

}
