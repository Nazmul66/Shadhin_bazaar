<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('backend.pages.role_and_permission.role.index');
    }

    public function getData()
    {
        // get all data
        $roles = Role::all();

        return DataTables::of($roles)
            ->addColumn('name', function ($role) {
                return '<span class="badge bg-primary">'. $role->name .'</span>';
            })
            ->addColumn('action', function ($role) {
                return '<div class="d-flex gap-3">
                    <a class="btn btn-sm btn-primary" id="editButton" href="javascript:void(0)"  data-id="'.$role->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>

                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$role->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>

                    <a class="btn btn-sm btn-success" href="'. route('admin.add-permission', $role->id) .'" data-id="'.$role->id.'"> <i class="bx bx-lock"></i></a>
                </div>';
            })

            ->rawColumns(['name', 'action'])
            ->make(true);
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

        // dd($role);
        $role->save();

        return response()->json(['message'=> "Successfully Role Created!", 'status' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        // dd($role);
        return response()->json(['success' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role  = Role::find($id);

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

        $role->save();

         return response()->json(['message'=> "success"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        
        return response()->json(['message' => 'Role has been deleted.'], 200);
    }

    public function addPermissionToRole(string $role_id)
    {
        $permission = Permission::get();
        $role = Role::findOrFail($role_id);
        
       return view('backend.pages.role_and_permission.role.add_permission',[
           'role' => $role,
            'permission' => $permission,
       ]);
    }

    public function givePermissionToRole(Request $request, string $role_id)
    {
        // dd($request->permission);

        $role = Role::findOrFail($role_id);

        // Fetch permission names from IDs to sync by name
        $permissions = Permission::whereIn('id', $request->permission)
        ->pluck('name');

        $role->syncPermissions($permissions);  // multiple permissions

        return redirect()->back();
    }
}