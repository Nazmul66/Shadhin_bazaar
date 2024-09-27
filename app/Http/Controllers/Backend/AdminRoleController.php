<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::orderBy('id', 'desc')->get();
        return view('backend.pages.role_and_permission.admin.index',[
            "admins" => $admins,
        ]);
    }

    public function create()
    {
        $roles = Role::where('guard_name', 'admin')->pluck('name', 'name')->all();
        return view('backend.pages.role_and_permission.admin.create',[
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate(
            [
                'name' => ['required', 'unique:admins,name', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'password' => ['required'],
                'role' => ['required'],
            ],
            [
                'name.required' => 'Please fill up the name',
                'name.max' => 'Character might be 255',
                'name.unique' => 'Character might be unique',
            ]
        );

        $admin = new Admin();

        $admin->name             = $request->name;
        $admin->email            = $request->email;
        $admin->password         = Hash::make($request->password);

        $admin->save();

        $admin->syncRoles($request->role); // sync roles

        return redirect()->route('admin.admin-role.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::where('guard_name', 'admin')->pluck('name', 'name')->all();
        $userRoles = $admin->roles->pluck('name', 'name')->all();
        
        return view('backend.pages.role_and_permission.admin.edit',[
            'admin' => $admin,
            'roles' => $roles,
            'userRoles' => $userRoles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin  = Admin::find($id);

        $request->validate(
            [
                'name' => ['required', 'unique:admins,name,'. $admin->id , 'max:255'],
            ],
            [
                'name.required' => 'Please fill up the name',
                'name.max' => 'Character might be 255 word',
                'name.unique' => 'Character might be unique',
            ]
        );

        $admin->name             = $request->name;
        $admin->email            = $request->email;

        if( !empty($request->password) ){
            $admin->password         = Hash::make($request->password);
        }
        $admin->update();

        $admin->syncRoles($request->role); // sync roles

        return redirect()->route('admin.admin-role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return response()->json(['message' => 'Admin Role has been deleted.'], 200);
    }

}
