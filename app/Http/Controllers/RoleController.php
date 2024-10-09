<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    
    public function admin_role()
    {
        
        $allrole=Role::paginate(5);
       
       return view('backend.admin-role',compact('allrole'));   
    }

    public function admin_role_form()
    {
        return view('backend.admin-role-form');    
    }

    public function admin_role_store(Request $request)
    {

        $validation=Validator::make($request->all(),
        [
            'role_name'=>'required|min:2',
        ]);
        
      
        Role::create([
           
            'name'=>$request->role_name,
            'description'=>$request->role_description
        ]);

        return redirect()->back();

    }
}
