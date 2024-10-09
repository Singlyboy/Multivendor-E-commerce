<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function users(){
        $allUsers =User::paginate(10);
        return view('backend.users', compact('allUsers'));
}
public function users_form()
{
    $allrole=Role::all();
    
    return view('backend.users-form',compact('allrole'));    
    
}

public function users_store(Request $request)
{
    $validation=Validator::make($request->all(),
    [
       
        'user_name'=>'required',
        'admin_role_id'=>'required',
        'user_password'=>'required'
    ]);

    

   User::create([
     
        'name'=>$request->user_name,
       
        'role_id'=>$request->role_id
    ]);

    return redirect()->route('parts.list');
}
}
