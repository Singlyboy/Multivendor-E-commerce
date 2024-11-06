<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
       
        $allUser = User::paginate(10);
        return view('backend.pages.user.index', compact('allUser'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $allrole=Role::where('name','!=','admin')->get();
        return view('backend.pages.user.create',compact('allrole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserValidation $request)
    {
        // dd($request->all());
        User::create([
            'name'=>$request->user_name,
            'email'=>$request->user_email,
            'role_id'=>$request->role_id,
            'password' => bcrypt($request->user_password),
        ]);

        notify()->success("User Created Successfully.");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
