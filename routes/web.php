<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserAuthenticationController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;


// Route::get('/',[HomeController::class,'home'])->name('dashboard');
Route::get('/',[HomeControler::class,'home'])->name('home');


Route::get('/Login',[UserAuthenticationController::class,'view_login_form'])->name('Login.view.form');
Route::post('/do-Login',[UserAuthenticationController::class,'do_login'])->name('Do.Login');



//role

Route::get('/admin-role',[RoleController::class,'admin_role'])->name('admin.role');



//category

Route::get('/category',[CategoryController::class,'category'])->name('category.list');
Route::get('/category-form',[CategoryController::class,'form'])->name('category.form');
Route::post('/category-store',[CategoryController::class,'store'])->name('category.store');

