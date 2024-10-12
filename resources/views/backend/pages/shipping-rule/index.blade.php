@extends('backend.layout.master')


@push('title')
    List Shipping Rules
@endpush


@push('add-css')

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css">

@endpush


@section('body-content')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Shipping Rules List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboards') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Shipping Rules</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Content part Start -->
    <div class="card">

        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">Shipping Rules List</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">
                    Create New
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0" id="dataTables">

                    <thead class="bg-primary text-white">
                    <tr>
                        <th>#SL.</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Min Cost</th>
                        <th>Cost</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Create Modal -->
        <div id="create_Modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Create Shipping Rules</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="createForm" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input class="form-control"  value="{{ old('name') }}" id="name" type="text" name="name">
    
                                    <span id="name_validate" class="text-danger mt-1"></span>
                                </div>
    
                                <div class="col mb-3">
                                    <label class="form-label" for="type">Type</label>
                                    <select class="form-select" name="type" id="type">
                                        <option value="flat_cost" selected>Flat Cost</option>
                                        <option value="min_cost">Minimum Order Amount</option>
                                    </select>
    
                                    <span id="type_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col mb-3 main_min_cost d-none">
                                    <label class="form-label" for="min_cost">Min Cost</label>
                                    <input class="form-control" value="{{ old('min_cost') }}" min="0" id="min_cost" type="number" name="min_cost">
    
                                    <span id="min_cost_validate" class="text-danger mt-1"></span>
                                </div>
    
                                <div class="col mb-3">
                                    <label class="form-label" for="cost">Cost</label>
                                    <input class="form-control"  value="{{ old('cost') }}" min="0" id="cost" type="number" name="cost" >
    
                                    <span id="cost_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-secondary waves-effect me-3"
                                  data-bs-dismiss="modal">Close </button>

                                <button type="submit" id="btn-store" class="btn btn-primary waves-effect waves-light"> Save changes </button>
                            </div>
                        </form>
                    </div>


                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


        <!-- Edit Modal -->
        <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Update Coupon</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="EditForm" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <input type="text" name="id" id="id" hidden>

                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label" for="up_name">Name</label>
                                    <input class="form-control" id="up_name" type="text" name="name">
    
                                    <span id="up_name_validate" class="text-danger mt-1"></span>
                                </div>
    
                                <div class="col mb-3">
                                    <label class="form-label" for="up_type">Type</label>
                                    <select class="form-select" name="type" id="up_type">
                                        <option value="flat_cost" selected>Flat Cost</option>
                                        <option value="min_cost">Minimum Order Amount</option>
                                    </select>
    
                                    <span id="up_type_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col mb-3 up_main_min_cost d-none">
                                    <label class="form-label" for="up_min_cost">Min Cost</label>
                                    <input class="form-control" id="up_min_cost" min="0" type="number" name="min_cost">
    
                                    <span id="up_min_cost_validate" class="text-danger mt-1"></span>
                                </div>
    
                                <div class="col mb-3">
                                    <label class="form-label" for="up_cost">Cost</label>
                                    <input class="form-control" id="up_cost" min="0" type="number" name="cost" >
    
                                    <span id="up_cost_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="up_status" name="status">
                                    <option value="" disabled selected>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-secondary waves-effect me-3"
                                        data-bs-dismiss="modal">Close</button>

                                <button type="submit" id="btn-store" class="btn btn-primary waves-effect waves-light"> Save changes </button>
                            </div>
                        </form>
                    </div>


                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>

@endsection

@push('add-script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.min.js"></script>

    <script>

        $(document).ready(function () {

            $('#type').change(function(e){
                var val = $(this).val();

                if (val !== "min_cost") {
                // Hide if not 'min_cost'
                    $('.main_min_cost').addClass('d-none').removeClass('d-block');
                } else {
                    // Show if it is 'min_cost'
                    $('.main_min_cost').removeClass('d-none').addClass('d-block');
                }
            })

            $('#up_type').change(function(e){
                var val = $(this).val();
                
                if (val !== "min_cost") {
                // Hide if not 'min_cost'
                    $('.up_main_min_cost').addClass('d-none').removeClass('d-block');
                } else {
                    // Show if it is 'min_cost'
                    $('.up_main_min_cost').removeClass('d-none').addClass('d-block');
                }
            })

            // Show Data through Datatable
            let dataTabless = $('#dataTables').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,

                ajax: "{{ route('admin.shipping-rule-data') }}",
                // pageLength: 30,

                columns: [
                    {
                        data: 'id',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'type',
                    },
                    {
                        data: 'min_cost',
                    },
                    {
                        data: 'cost',
                    },
                    {
                        data: 'status',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });


            // status updates
            $(document).on('click', '#status', function () {
                var id = $(this).data('id');
                var status = $(this).data('status');

                // console.log(id, status);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.shipping-rule.status') }}",
                    data: {
                        // '_token': token,
                        id: id,
                        status: status
                    },
                    success: function (res) {
                        dataTabless.ajax.reload();

                        if (res.status == 1) {
                            swal.fire(
                                {
                                    title: 'Status Changed to Active',
                                    icon: 'success'
                                })
                        } else {
                            swal.fire(
                                {
                                    title: 'Status Changed to Inactive',
                                    icon: 'success'
                                })
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }

                })
            })


            // Create 
            $('#createForm').submit(function (e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.shipping-rule.store') }}",
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        console.log(res);
                        if (res.status === true) {
                            $('#create_Modal').modal('hide');
                            $('#createForm')[0].reset();
                            dataTabless.ajax.reload();

                            swal.fire({
                                title: "Success",
                                text: `${res.message}`,
                                icon: "success"
                            })
                        }
                    },
                    error: function (err) {
                        let error = err.responseJSON.errors;

                        $('#name_validate').empty().html(error.name);
                        $('#type_validate').empty().html(error.type);
                        $('#cost_validate').empty().html(error.cost);

                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                    }
                });
            })


            // Edit 
            $(document).on("click", '#editButton', function (e) {
                let id = $(this).attr('data-id');
                // alert(id);

                $.ajax({
                    type: 'GET',
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    url: "{{ url('admin/shipping-rule/') }}/" + id + "/edit",
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        let data = res.success;
                        console.log(res)
                        
                        $('#id').val(data.id);
                        $('#up_name').val(data.name);
                        $('#up_type').val(data.type);
                        $('#up_min_cost').val(data.min_cost);
                        $('#up_cost').val(data.cost);
                        $('#up_status').val(data.status);

                    },
                    error: function (error) {
                        console.log('error');
                    }

                });
            })


            // Update 
            $("#EditForm").submit(function (e) {
                e.preventDefault();

                let id = $('#id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/shipping-rule') }}/" + id,
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {

                        swal.fire({
                            title: "Success",
                            text: "Shipping Rule Edited",
                            icon: "success"
                        })

                        $('#editModal').modal('hide');
                        $('#EditForm')[0].reset();
                        dataTabless.ajax.reload();
                    },
                    error: function (err) {
                        let error = err.responseJSON.errors;

                        $('#up_name_validate').empty().html(error.name);
                        $('#up_type_validate').empty().html(error.type);
                        $('#up_cost_validate').empty().html(error.cost);

                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                    }
                });

            });


            // Delete Coupon
            $(document).on("click", "#deleteBtn", function () {
                let id = $(this).data('id')

                swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                })
                    .then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'DELETE',

                                url: "{{ url('admin/shipping-rule/') }}/" + id,
                                data: {
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                },
                                success: function (res) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: `${res.message}`,
                                        icon: "success"
                                    });

                                    dataTabless.ajax.reload();
                                },
                                error: function (err) {
                                    console.log('error')
                                }
                            })

                        } else {
                            swal.fire('Your Data is Safe');
                        }

                    })
            })
        })


    </script>
@endpush

