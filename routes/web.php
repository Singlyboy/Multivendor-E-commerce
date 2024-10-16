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



//admin role

Route::get('/admin-role',[RoleController::class,'admin_role'])->name('admin.role');
Route::get('/admin-role-form',[RoleController::class,'admin_role_form'])->name('admin.role.form');
Route::post('/admin-role-store',[RoleController::class,'admin_role_store'])->name('admin.role.store');
//update and delate for admin.role
Route::get('/admin-role/delete/{r_id}',[RoleController::class,'delete'])->name('admin.role.delete');
Route::get('/admin-role/edit/{r_id}',[RoleController::class,'edit'])->name('admin.role.edit');
Route::post('/admin-role/update/{r_id}',[RoleController::class,'update'])->name('admin.role.update');
Route::get('/admin-role/view/{r_id}',[RoleController::class,'assignRole'])->name('assign.role.view');

//users 
Route::get('/users',[UserController::class,'users'])->name('users.list');
Route::get('/users-form',[UserController::class,'users_form'])->name('users.form');
Route::post('/user-store',[UserController::class,'users_store'])->name('users.store');

Route::get('/user-role/delete/{u_id}',[UserController::class,'delete'])->name('user.role.delete');
Route::get('/user-role/edit/{u_id}',[UserController::class,'edit'])->name('user.role.edit');
Route::post('/user-role/update/{u_id}',[UserController::class,'update'])->name('user.role.update');



//category

Route::get('/category',[CategoryController::class,'category'])->name('category.list');
// Route::get('/category-form',[CategoryController::class,'form'])->name('category.form');
// Route::post('/category-store',[CategoryController::class,'store'])->name('category.store');

});