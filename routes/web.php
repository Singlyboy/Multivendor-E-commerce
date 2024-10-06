<?php

use App\Http\Controllers\HomeControler;
use Illuminate\Support\Facades\Route;


// Route::get('/',[HomeController::class,'home'])->name('dashboard');
Route::get('/',[HomeControler::class,'home'])->name('home');