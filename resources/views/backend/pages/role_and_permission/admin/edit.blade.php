@extends('backend.layout.master')

@push('title')
    Update Admin User
@endpush

@push('add-css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css"> --}}
@endpush

@section('body-content')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Update User</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboards') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Content part Start -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Update User</h4>
                <a href="{{ route('admin.admin-role.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.admin-role.update', $admin->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" type="text" value="{{ $admin->name }}" name="name" id="name" placeholder="Write Your Name.....">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" value="{{ $admin->email }}" name="email" id="email" readonly placeholder="Write Your Email.....">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" value="{{ $admin->name }}" name="password" id="password" placeholder="****************">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="role">Roles</label>
                            <select class="form-select" id="role" name="role[]" multiple>
                                @foreach ($roles as $role)
                                   <option 
                                        value="{{ $role }}"
                                        {{ in_array($role, $userRoles) ? "selected" : "" }}
                                        >{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection


