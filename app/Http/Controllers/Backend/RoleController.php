<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        $permissions = Permission::select('id', 'name', 'guard_name', 'group_name')
                        ->where('guard_name', 'admin') // always define this guard name
                        ->orderBy('group_name')
                        ->get()
                        ->groupBy('group_name');  // Group permissions by 'group_name'
       return view('backend.pages.role_and_permission.role.create',[
             'permissions' => $permissions
       ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'unique:roles,name', 'max:255'],
            ],
            [
                'name.required' => 'Please fill up the name',
                'name.max' => 'Character might be 255',
                'name.unique' => 'Character might be unique',
            ]
        );

        $role = new Role();

        $role->name             = $request->name;
        $role->guard_name       = "admin";

        $role->save();

        $role->syncPermissions($request->permission);  // multiple permissions

        return redirect()->route('admin.role.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        
        $role_has_permissions = DB::table('role_has_permissions')
                    ->where('role_id', $role->id)
                    ->pluck('permission_id')
                    ->all();

        $permissions = Permission::select('id', 'name', 'guard_name', 'group_name')
                ->where('guard_name', 'admin') // always define this guard name
                ->orderBy('group_name')
                ->get()
                ->groupBy('group_name');  // Group permissions by 'group_name'
                
        return view('backend.pages.role_and_permission.role.edit',[
            "role" => $role,
            "permissions" => $permissions,
            "role_has_permissions" => $role_has_permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);

        $request->validate(
            [
                'name' => ['required', 'unique:roles,name,'. $role->id , 'max:255'],
            ],
            [
                'name.required' => 'Please fill up the name',
                'name.max' => 'Character might be 255 word',
                'name.unique' => 'Character might be unique',
            ]
        );

        $role->name             = $request->name;
        $role->guard_name       = "admin";

        $role->save();

        $role->syncPermissions($request->permission);  // multiple permissions

        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        Role::findOrFail($id)->delete();
        
        return redirect()->back();
    }
}