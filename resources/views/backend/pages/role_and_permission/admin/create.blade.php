@extends('backend.layout.master')

@push('title')
    Create Admin User
@endpush

@push('add-css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css"> --}}
@endpush

@section('body-content')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Create User</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboards') }}">Dashboard</a></li>
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
                <h4>Create User</h4>
                <a href="{{ route('admin.admin-role.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.admin-role.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Write Your Name.....">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Write Your Email.....">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Write Your Password.....">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="role">Roles</label>
                            <select class="form-select" id="role" name="role[]" multiple>
                                @foreach ($roles as $role)
                                   <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection


