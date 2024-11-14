<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserAuthenticationController;
use App\Http\Controllers\UserController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\CustomerController as FrontendCustomerController;
use App\Http\Controllers\ProductController;

Route::get('/',[FrontendHomeController::class,'home'])->name('home');
Route::post('/registration',[FrontendCustomerController::class,'registration'])->name('customer.registration');
Route::post('/do-login',[FrontendCustomerController::class,'customerLogin'])->name('customer.login');
Route::get('/otp',[FrontendHomeController::class,'otpPage'])->name('otp.page');
Route::post('/otp-submit',[FrontendHomeController::class,'otpSubmit'])->name('otp.submit');
Route::get('/resend-otp/{email}',[FrontendHomeController::class,'otpResend'])->name('otp.resend');

Route::group(['middleware'=>'customer_auth'],function (){

Route::get('/logout',[FrontendCustomerController::class,'customerLogout'])->name('customer.logout');

});


Route::group(['prefix' => 'admin'], function () {


Route::get('/Login',[UserAuthenticationController::class,'view_login'])->name('login');
Route::post('/do-Login',[UserAuthenticationController::class,'do_login'])->name('Do.Login');


Route::group(['middleware' => ['auth','check_permission']], function () {

 Route::get('/',[HomeControler::class,'home'])->name('deshboard');
 Route::get('/logout', [UserAuthenticationController::class, 'logout'])->name('logout');

Route::get('/admin-role',[RoleController::class,'admin_role'])->name('admin.role');
Route::get('/admin-role-form',[RoleController::class,'admin_role_form'])->name('admin.role.form');
Route::post('/admin-role-store',[RoleController::class,'admin_role_store'])->name('admin.role.store');
//update and delate for admin.role
Route::get('/admin-role/delete/{r_id}',[RoleController::class,'delete'])->name('admin.role.delete');
Route::get('/admin-role/edit/{r_id}',[RoleController::class,'edit'])->name('admin.role.edit');
Route::post('/admin-role/update/{r_id}',[RoleController::class,'update'])->name('admin.role.update');
Route::get('/admin-role/view/{r_id}',[RoleController::class,'showRole'])->name('role.view');
Route::post('/admin-role/permissions/assign/{r_id}', [RoleController::class, 'assignPermission'])->name('admin.permission.assign');




Route::resource('users',UserController::class);
Route::resource('category',CategoryController::class);
Route::get('/ajax-Category-data',[CategoryController::class,'getCategoryData'])->name('ajax.category.data');
Route::get('/pdf',[HomeControler::class,'generatePDF'])->name('pdf');


Route::get('/product-list', [ProductController::class, 'productList'])->name('product.list');

Route::get('/product-create', [ProductController::class, 'create'])->name('product.create');

Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/delete/{p_id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/view/{p_id}', [ProductController::class, 'viewProduct'])->name('product.view');
Route::get('/product/edit/{sojibId}', [ProductController::class, 'edit'])->name('product.edit');

Route::post('/product/update/{paglaID}', [ProductController::class, 'update'])->name('product.update');

Route::get('/ajax-product-data',[ProductController::class,'getProductData'])->name('ajax.product.data');


//category


});

}); 