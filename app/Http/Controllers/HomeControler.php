<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControler extends Controller
{
    Public function home()
    {
        return view("backend.home");  
    }
}
