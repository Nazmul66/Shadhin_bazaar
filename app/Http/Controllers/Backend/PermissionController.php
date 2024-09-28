<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('backend.pages.role_and_permission.permission.index');
    }

    public function getData()
    {
        // get all data
        $permissions = Permission::all();

        return DataTables::of($permissions)
            ->addColumn('name', function ($permission) {
                return '<span class="badge bg-primary">'. $permission->name .'</span>';
            })
            ->addColumn('group_name', function ($permission) {
                return '<span class="badge bg-success">'. $permission->group_name .'</span>';
            })
            ->addColumn('action', function ($permission) {
                return '<div class="d-flex gap-3">
                    <a class="btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$permission->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>

                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$permission->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
                </div>';
            })

            ->rawColumns(['name', 'group_name', 'action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'unique:permissions,name', 'max:255'],
                'group_name' => ['required', 'max:255'],
            ],
            [
                'name.required' => 'Please fill up the name',
                'name.max' => 'Character might be 255',
                'name.unique' => 'Character might be unique',
                'group_name.required' => 'Group Name Required',
                'group_name.max' => 'Group Name character might be 255',
            ]
        );

        $permission = new Permission();

        $permission->name             = strtolower($request->name);
        $permission->group_name       = strtolower($request->group_name);
        $permission->guard_name       = "admin";

        // dd($permission);
        $permission->save();

        return response()->json(['message'=> "Successfully Permission Created!", 'status' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        // dd($permission);
        return response()->json(['success' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission  = Permission::find($id);

        $request->validate(
            [
                'name' => ['required', 'unique:permissions,name,'. $permission->id , 'max:255'],
                'group_name' => ['required', 'max:255'],
            ],
            [
                'name.required' => 'Please fill up the name',
                'name.max' => 'Character might be 255 word',
                'name.unique' => 'Character might be unique',
                'group_name.required' => 'Group Name Required',
                'group_name.max' => 'Group Name character might be 255',
            ]
        );

        $permission->name             = strtolower($request->name);
        $permission->group_name       = strtolower($request->group_name);
        $permission->guard_name       = "admin";

        $permission->save();

         return response()->json(['message'=> "success"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return response()->json(['message' => 'Permission has been deleted.'], 200);
    }

}
