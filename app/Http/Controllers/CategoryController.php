<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    Public function category()
    {
        return view("backend.category");  
    }
}
