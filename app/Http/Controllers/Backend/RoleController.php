<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::where('guard_name', 'admin')->get();
        return view('backend.pages.role_and_permission.role.index',[
            "roles" => $roles
        ]);
    }

    public function create()
    {
        // [ V.V.V.I ] AKhane 2ta bhag a query run kora hoyese, first get porjonto shob gulo loop kore dekhabe then group by ta alada query hisebe show kore dekhabe, example below-->

        $data['permissions']        = Permission::all();
        $data['permission_groups']  = Admin::getPermissionGroup();
       return view('backend.pages.role_and_permission.role.create', $data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'          => 'required|string|unique:roles,name|max:255',
            'permissions'    => 'required|array|min:1', 
            'permissions.*' => 'string|exists:permissions,name', 
        ]);

        DB::beginTransaction();
        try {
            $role = Role::create([
                    'name'       => $request->name,
                    'guard_name' => 'admin',
                ]);

            $role->syncPermissions($request->permissions);  // multiple permissions
        }
        catch(\Exception $ex){
            // throw $ex;
            DB::rollBack();
            Toastr::error('Role created error', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
            // dd($ex->getMessage());
        }

        DB::commit();
        Toastr::success('Role created Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.role.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['role']               = Role::findOrFail($id);
        $data['permissions']        = Permission::all();
        $data['permission_groups']  = Admin::getPermissionGroup(); 

        // Get all permissions for this role
        $data['rolePermissions']   = $data['role']->permissions->pluck('name')->toArray();
        return view('backend.pages.role_and_permission.role.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // $role = Role::findOrFail($id);
        $request->validate([
            'name'           => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions'    => 'required|array|min:1', 
            'permissions.*'  => 'string|exists:permissions,name', 
        ]);

        DB::beginTransaction();
        try {
            $role->update([
                'name'       => $request->name,
                'guard_name' => 'admin',
            ]);

            $role->syncPermissions($request->permissions);  // multiple permissions
        }
        catch(\Exception $ex){
            DB::rollBack();
            // throw $ex;
            Toastr::error('Role Updated error', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
            // dd($ex->getMessage());
        }

        DB::commit();
        Toastr::success('Role Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $role = Role::findOrFail($id);

        // Detach all permissions from the role
        $role->syncPermissions([]);

        // Delete the role
        $role->delete();
        
        Toastr::success('Role Delete Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}