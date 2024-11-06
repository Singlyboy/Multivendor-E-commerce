<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

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
            'status'=>$request->role_status
        ]);

        return redirect()->back();

    }
    public function delete($id)
    {
    
        $allrole=Role::find($id);//data entry
        
        $allrole->delete();//delete done
       
        return redirect()->back();
    
        
    }
    public function edit($id)
{

    $allrole=Role::find($id);
   
    return view('backend.pages.role-edit',compact('allrole'));
}
    
public function update(Request $request,$id)
{
    

    //validation
    $validation=Validator::make($request->all(),
    [
        'cat_name'=>'required|min:2',
    ]);


    //query
    $allrole=Role::find($id);
    $allrole->update([
        'name'=>$request->role_name,
        'status'=>$request->role_status
    ]);
  
    notify()->success('role updated successfully.');
    return redirect()->route('admin.role');


}
public function showRole($role_id)
    {
        $rolePermissions=RolePermission::where('role_id',$role_id)->get()->pluck('permission_id')->toArray();
       
        $permissions = Permission::all();
        return view('backend.pages.show_permissions', compact('permissions','rolePermissions','role_id'));
    }

    public function assignPermission(Request $request,$role_id)
    {

      

        $validation = Validator::make(
            $request->all(),
            [
                'permission.*' => 'required',
            ]
        );

        if ($validation->fails()) {
            notify()->error($validation->getMessageBag());
            return redirect()->back();
        }


        try {

            RolePermission::where('role_id',$role_id)->delete();

            foreach($request->permission as $permission_id)
            {
                RolePermission::create([
                    'role_id' => $role_id,
                    'permission_id' => $permission_id,
    
                ]);
            }
            

            notify()->success('Permission Assigned.');
            return redirect()->back();
        } catch (Throwable $e) {
            notify()->error($e->getMessage());

            return redirect()->back();
        }
    }
}
