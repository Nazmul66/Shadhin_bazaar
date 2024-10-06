@extends('backend.layout.master')

@section('edit_role', 'mm-active')

@push('title')
    Update Role
@endpush

@push('add-css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css"> --}}
@endpush

@section('body-content')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Role</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboards') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Role</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Content part Start -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 >Update Role</h3>
                <a href="{{ route('admin.role.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.role.update', $role->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 mb-3">
                        <input type="text" class="form-control" placeholder="Create Role....." required name="name" value="{{ $role->name }}">
                    </div>

                    <div class="col-lg-2 offset-lg-4 text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

                <div class="mb-5">
                    <h3 >Permission List</h3>
                </div>

                <div class="row mb-5">
                    @foreach($permissions as $groupName => $groupPermissions)  <!-- Loop through groups -->
                        <div class="col-12 mb-4">
                            <h5>{{ ucfirst($groupName) }}</h5>  <!-- Display group name -->
                
                            @foreach($groupPermissions as $permission)  <!-- Loop through permissions in the group -->
                                <div class="row mb-2">
                                    <div class="col-9 offset-1">
                                        <div class="d-flex align-items-center border-bottom py-2">
                                            <input 
                                                class="form-check-input m-0" 
                                                type="checkbox" 
                                                name="permission[]" 
                                                value="{{ $permission->name }}"
                                                {{ in_array($permission->id , $role_has_permissions) ? "checked" : "" }} 
                                            >
                                            <div class="w-100 ms-3">
                                                <span>{{ $permission->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

            </form>
        </div>
    </div>

@endsection


