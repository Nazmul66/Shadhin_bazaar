@extends('backend.layout.master')

@push('title')
    Create Category
@endpush

@push('add-css')

    <link href="{{ asset('public/backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">

@endpush

@section('body-content')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Slider</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Content part Start -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">Sliders List</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">
                    Create Slider
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0" id="slidersTable">

                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Slider Image</th>
                            <th>Slider Type</th>
                            <th>Slider Title</th>
                            <th>Price</th>
                            <th>Url</th>
                            <th>Serial</th>
                            <th>Status</th>
                            <th>Actions</th>
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
                        <h5 class="modal-title" id="myModalLabel">Add New Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        {{-- method="POST" action="{{ route('admin.category.store') }}" --}}
                        <form id="createForm" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="slider_image" class="form-label">Slider Image </label>
                                    <input type="file" class="form-control" name="slider_image" id="slider_image" required >
                                </div>
                                
                                <div class="col mb-3">
                                    <label for="title" class="form-label">Slider Title</label>
                                    <input class="form-control" id="title" type="text" name="title" required >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="type" class="form-label">Slider Type</label>
                                    <input class="form-control" id="type" type="text" name="type" >
                                </div>
                                
                                <div class="col mb-3">
                                    <label for="starting_price" class="form-label">Price</label>
                                    <input class="form-control" id="starting_price" type="number" name="starting_price" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="btn_url" class="form-label">Button Url</label>
                                    <input class="form-control" id="btn_url" type="text" name="btn_url">
                                </div>
                                
                                <div class="col mb-3">
                                    <label for="serial" class="form-label">Serial</label>
                                    <input class="form-control" id="serial" type="text" name="serial" required >
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status" required >
                                        <option value="" disabled="" selected="">Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-secondary waves-effect me-3"
                                    data-bs-dismiss="modal">Close</button>

                                <button type="submit" id="btn-store" class="btn btn-primary waves-effect waves-light"> Save changes</button>
                            </div>
                        </form>
                    </div>


                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


        <!-- Edit Modal -->
        <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        {{-- method="POST" action="{{ route('admin.category.store') }}" --}}
                        <form id="editForm" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <input type="text" name="id" id="up_id" hidden>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="slider_image" class="form-label">Slider Image </label>
                                    <input type="file" class="form-control" name="slider_image" id="slider_image">

                                    <div id="imageShow"></div>
                                </div>
                                
                                <div class="col mb-3">
                                    <label for="up_title" class="form-label">Slider Title</label>
                                    <input class="form-control" id="up_title" type="text" name="title">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="up_type" class="form-label">Slider Type</label>
                                    <input class="form-control" id="up_type" type="text" name="type">
                                </div>
                                
                                <div class="col mb-3">
                                    <label for="up_starting_price" class="form-label">Price</label>
                                    <input class="form-control" id="up_starting_price" type="number" name="starting_price">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="up_btn_url" class="form-label">Button Url</label>
                                    <input class="form-control" id="up_btn_url" type="text" name="btn_url">
                                </div>
                                
                                <div class="col mb-3">
                                    <label for="up_serial" class="form-label">Serial</label>
                                    <input class="form-control" id="up_serial" type="text" name="serial">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="up_status">Status</label>
                                <select class="form-select" id="up_status" name="status">
                                    <option value="" disabled selected>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-secondary waves-effect me-3"
                                        data-bs-dismiss="modal">Close
                                </button>

                                <button type="submit" id="btn-store" class="btn btn-primary waves-effect waves-light">
                                    Save changes
                                </button>
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
    <script src="{{asset('public/backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script>

        $(document).ready(function () {

            // Show Data through Datatable
            let slidersTable = $('#slidersTable').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,

                ajax: "{{ route('admin.slider-data') }}",
                // pageLength: 30,

                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'slider_image',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'type',
                    },
                    {
                        data: 'title',
                    },
                    {
                        data: 'starting_price',
                    },
                    {
                        data: 'btn_url',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'serial',
                        orderable: false,
                        searchable: false,
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

            //  status updates
            $(document).on('click', '#status', function () {
                var id = $(this).data('id');
                var status = $(this).data('status');

                // console.log(id, status);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.slider.status') }}",
                    data: {
                        // '_token': token,
                        id: id,
                        status: status
                    },
                    success: function (res) {
                        slidersTable.ajax.reload();

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

            // Create Slider
            $('#createForm').submit(function (e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.slider.store') }}",
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        // console.log(res);
                        if (res.status === true) {
                            $('#create_Modal').modal('hide');
                            $('#createForm')[0].reset();
                            slidersTable.ajax.reload();

                            swal.fire({
                                title: "Success",
                                text: `${res.message}`,
                                icon: "success"
                            })
                        }
                    },
                    error: function (err) {
                        console.error('Error:', err);
                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                    }
                });
            })

            // Edit Slider
            $(document).on("click", '#editButton', function (e) {
                let id = $(this).attr('data-id');
                // alert(id);

                $.ajax({
                    type: 'GET',
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    url: "{{ url('admin/slider') }}/" + id + "/edit",
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        let data = res.success;
                        
                        $('#up_id').val(data.id);
                        $('#up_title').val(data.title);
                        $('#up_type').val(data.type);
                        $('#up_starting_price').val(data.starting_price);
                        $('#up_btn_url').val(data.btn_url);
                        $('#up_serial').val(data.serial);
                        $('#imageShow').html('');
                        $('#imageShow').append(`
                         <img src={{ asset("`+ data.slider_image +`") }} alt="" style="width: 75px;">
                    `);
                        $('#up_status').val(data.status);


                    },
                    error: function (error) {
                        console.log('error');
                    }

                });
            })

            // Update Slider
            $("#editForm").submit(function (e) {
                e.preventDefault();

                let id = $('#up_id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/slider') }}/" + id,
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {

                        swal.fire({
                            title: "Success",
                            text: "Slider Edited",
                            icon: "success"
                        })

                        $('#editModal').modal('hide');
                        $('#editForm')[0].reset();
                        slidersTable.ajax.reload();
                    },
                    error: function (err) {
                        console.error('Error:', err);
                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                    }
                });

            });

            // Delete Slider
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

                                url: "{{ url('admin/slider') }}/" + id,
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

                                    slidersTable.ajax.reload();
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

