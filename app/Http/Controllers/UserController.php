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
        'user_email'=>'required',
        'user_phone'=>'required',
        'admin_role_id'=>'required',
        'user_password'=>'required'
    ]);

    

   User::create([
     
        'name'=>$request->user_name,
        'email'=>$request->user_email,
        'phone'=>$request->user_phone,
        'role_id'=>$request->role_id,
        'password'=>$request->user_password,
    ]);

    return redirect()->route('users.list');
}

public function delete($id)
{

    $users=User::find($id);//data entry
    $users->delete();//delete done

    // notify()->success('User Deleted successfully.');

    return redirect()->back();
   
}
public function edit($id)
{

    $users=User::find($id);
    $allrole=Role::all();
    return view('backend.pages.user-edit',compact('allrole','users'));
}
public function update(Request $request,$id)
{
    
    //validation
    $validation=Validator::make($request->all(),
    [
       
        'user_name'=>'required',
        'user_email'=>'required',
        'user_phone'=>'required',
        'admin_role_id'=>'required',
       
        
    ]);


    //query
    $users=User::find($id);
    $users->update([
       'name'=>$request->user_name,
        'email'=>$request->user_email,
        'phone'=>$request->user_phone,
        'role_id'=>$request->role_id,
        
    ]);
  
    // notify()->success('Parts updated successfully.');
    return redirect()->route('');


}
}
