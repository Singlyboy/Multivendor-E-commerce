<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class HomeControler extends Controller
{
    Public function home()
    {
        return view("backend.home");  
    }
    public function generatePDF()
    {
        $users = User::get();
    
        $data = [
            'title' => 'Welcome to StS.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
              
        $pdf = PDF::loadView('backend.StS', $data);
       
        return $pdf->download('StS.pdf');
    }
}

