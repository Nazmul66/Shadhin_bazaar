@extends('backend.layout.master')

@section('admin-role', 'active')

@push('title')
    Create Admin Role
@endpush

@push('add-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css">
@endpush

@section('body-content')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">All Users</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboards') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">User List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Content part Start -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">All Users</h4>
                <a href="{{ route('admin.admin-role.create') }}" class="btn btn-primary">
                    Add User
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0" id="adminRoleTable">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#SL.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width: 600px;">Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $row => $admin )
                            <tr>
                                <td>{{ $row + 1 }}</td>
                                <td><span class="badge bg-primary">{{ $admin->name }}</span></td>
                                <td>
                                    <a href="mailto: {{ $admin->email }}" class="badge bg-success">{{ $admin->email }}</a>
                                </td>
                                <td style="width: 600px;">
                                    @foreach ($admin->getRoleNames() as $role)
                                         <span class="badge bg-secondary">{{ $role }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a class="btn btn-sm btn-info" href="{{ route('admin.admin-role.edit', $admin->id) }}"><i class='bx bx-lock'></i></i></a>

                                        <form action="" method="POST" style="display:inline;">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('add-script')
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.min.js"></script>

    <script>

        $(document).ready(function () {
            let table = new DataTable('#adminRoleTable');
        })

    </script>
@endpush

