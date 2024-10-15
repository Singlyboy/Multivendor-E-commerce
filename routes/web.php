<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserAuthenticationController;
use App\Http\Controllers\UserController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;




Route::group(['prefix' => 'admin'], function () {
Route::get('/',[HomeControler::class,'home'])->name('home');


Route::get('/Login',[UserAuthenticationController::class,'view_login_form'])->name('Login.view.form');
Route::post('/do-Login',[UserAuthenticationController::class,'do_login'])->name('Do.Login');



//role

Route::get('/admin-role',[RoleController::class,'admin_role'])->name('admin.role');
Route::get('/admin-role-form',[RoleController::class,'admin_role_form'])->name('admin.role.form');
Route::post('/admin-role-store',[RoleController::class,'admin_role_store'])->name('admin.role.store');

//user 
Route::get('/users',[UserController::class,'users'])->name('users.list');
Route::get('/users-form',[UserController::class,'users_form'])->name('users.form');
Route::post('/user-store',[UserController::class,'users_store'])->name('users.store');


//category

Route::get('/category',[CategoryController::class,'category'])->name('category.list');
// Route::get('/category-form',[CategoryController::class,'form'])->name('category.form');
// Route::post('/category-store',[CategoryController::class,'store'])->name('category.store');

});