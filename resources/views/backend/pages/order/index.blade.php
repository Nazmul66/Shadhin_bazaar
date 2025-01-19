@extends('backend.layout.master')

@push('title')
    All Orders List
@endpush

@push('add-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/backend/assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css">
@endpush

@section('body-content')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">All Orders</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboards') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


        <!-- Content part Start -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Orders List</h4>
                </div>
            </div>
            
    
            <div class="card-body">
                <div class="">
                    <table class="table table-bordered mb-0" id="datatables">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>#SL.</th>
                                <th>Invoice Id</th>
                                <th>Customer Name</th>
                                <th>Product Quantity</th>
                                <th>Total Amount</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection

@push('add-script')
    {{-- data.setData(res.data.schedules_desc); --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
    <script src="{{ asset('public/backend/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.min.js"></script>
    <script src="{{ asset('public/backend/assets/js/all_plugins.js') }}"></script>

    <script>
        $(document).ready(function () {

            // Show Data through Datatable
            let datatables = $('#datatables').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,

                ajax: "{{ route('admin.order-data') }}",
                // pageLength: 30,

                columns: [
                    { 
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex', 
                        orderable: false, 
                        searchable: false 
                    },
                    {
                        data: 'invoice_id',
                    },
                    {
                        data: 'cus_name',
                    },
                    {
                        data: 'product_qty',
                    },
                    {
                        data: 'total_amount',
                    },
                    {
                        data: 'payment_method',
                    },
                    {
                        data: 'payment_status',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'order_status',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'order_date',
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


            // Payment status updates
            $(document).on('change', '#payment_status', function () {
                var id     = $(this).data('id');
                var status = $(this).val();

                // console.log(id, status);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.change.payment.status') }}",
                    data: {
                        // '_token': token,
                        id: id,
                        status: status
                    },
                    success: function (res) {
                        datatables.ajax.reload();

                        // Display a success message
                        if (res.status == 0) {
                            Swal.fire({
                                title: 'Payment status ( Pending ) updated successfully!',
                                icon: 'success'
                            });
                        } else if (res.status == 1) {
                            Swal.fire({
                                title: 'Payment status ( Paid ) updated successfully!',
                                icon: 'success'
                            });
                        } else {
                            Swal.fire({
                                title: 'Payment status ( Due ) updated successfully!',
                                icon: 'success'
                            });
                        }
                    },
                    error: function (err) {
                        console.error(err);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to update payment status.',
                            icon: 'error'
                        });
                    }
                })
            })

            // Order status updates
            $(document).on('change', '#order_status', function () {
                var id     = $(this).data('id');
                var status = $(this).val();

                // console.log(id, status);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.change.order.status') }}",
                    data: {
                        // '_token': token,
                        id: id,
                        status: status
                    },
                    success: function (res) {
                        datatables.ajax.reload();

                        // Display a success message
                        if (res.status === "pending") {
                            Swal.fire({
                                title: 'Order status ( Pending ) updated successfully!',
                                icon: 'success'
                            });
                        } 
                        else if (res.status === "processed_and_ready_to_ship") {
                            Swal.fire({
                                title: 'Order status ( processed_and_ready_to_ship ) updated successfully!',
                                icon: 'success'
                            });
                        }
                        else if (res.status === "dropped_off") {
                                Swal.fire({
                                    title: 'Order status ( dropped_off ) updated successfully!',
                                    icon: 'success'
                                });
                            }
                        else if (res.status === "shipped") {
                            Swal.fire({
                                title: 'Order status ( shipped ) updated successfully!',
                                icon: 'success'
                            });
                        }
                        else if (res.status === "out_for_delivery") {
                            Swal.fire({
                                title: 'Order status ( out_for_delivery ) updated successfully!',
                                icon: 'success'
                            });
                        } 
                        else {
                            Swal.fire({
                                title: 'Order status ( delivered ) updated successfully!',
                                icon: 'success'
                            });
                        }
                    },
                    error: function (err) {
                        console.error(err);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to update payment status.',
                            icon: 'error'
                        });
                    }
                })
            })

            // // Edit 
            // $(document).on("click", '#editButton', function (e) {
            //     let id = $(this).attr('data-id');
            //     // alert(id);

            //     $.ajax({
            //         type: 'GET',
            //         // headers: {
            //         //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         // },
            //         url: "{{ url('admin/product') }}/" + id + "/edit",
            //         processData: false,  // Prevent jQuery from processing the data
            //         contentType: false,  // Prevent jQuery from setting contentType
            //         success: function (res) {
            //             console.log(res.success);
            //             let data = res.success;

            //             $('#id').val(data.id);
            //             $('#up_name').val(data.name);
            //             $('#up_sku').val(data.sku);
            //             $('#up_category_id').val(data.category_id).trigger('change');  // <-- This is important for select2
            //             $('#up_subCategory_id').val(data.subCategory_id).trigger('change');  // <-- This is important for select2
            //             $('#up_childCategory_id').val(data.childCategory_id).trigger('change');  // <-- This is important for select2
            //             $('#up_brand_id').val(data.brand_id).trigger('change');  // <-- This is important for select2
            //             $('#up_price').val(data.price);
            //             $('#up_offer_price').val(data.offer_price);
            //             $('#up_qty').val(data.qty);
            //             $('#up_offer_start_date').val(data.offer_start_date);
            //             $('#up_offer_end_date').val(data.offer_end_date);
            //             $('#up_video_link').val(data.video_link);
            //             $('#up_short').val(data.short_description);

            //             // Set CKEditor content
            //             if (longDescriptionEditor) {
            //                 longDescriptionEditor.setData(data.long_description); // Set long_description
            //             }

            //             // Reinitialize Choices after setting the value
            //             tagChoices.setValue(data.tags.split(','));

            //             $('#up_type').val(data.type);
            //             // $('#up_is_featured').val(data.is_featured);
            //             // $('#up_is_top').val(data.is_top);
            //             // $('#up_is_best').val(data.is_best);
            //             $('#up_seo_title').val(data.seo_title);
            //             $('#up_seo_description').val(data.seo_description);
            //             // Set image
            //             $('#imageShow').html('');
            //             $('#imageShow').append(`
            //              <a href="{{ asset("`+ data.thumb_image +`") }}" target="__blank">
            //                  <img src="{{ asset("`+ data.thumb_image +`") }}" alt="Product Image" style="width: 75px;"> 
            //               </a>
            //             `);
            //         },
            //         error: function (error) {
            //             console.log('error');
            //         }

            //     });
            // })


            // // Update 
            // $("#EditForm").submit(function (e) {
            //     e.preventDefault();

            //     let id = $('#id').val();
            //     let formData = new FormData(this);

            //     $.ajax({
            //         type: "POST",
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         url: "{{ url('admin/product') }}/" + id,
            //         data: formData,
            //         processData: false,  // Prevent jQuery from processing the data
            //         contentType: false,  // Prevent jQuery from setting contentType
            //         success: function (res) {

            //             swal.fire({
            //                 title: "Success",
            //                 text: "Product Edited",
            //                 icon: "success"
            //             })

            //             $('#editModal').modal('hide');
            //             $('#EditForm')[0].reset();
            //             datatables.ajax.reload();
            //         },
            //         error: function (err) {
            //             let error = err.responseJSON.errors;

            //             $('#up_name_validate').empty().html(error.name);
            //             $('#up_category_id_validate').empty().html(error.category_id);
            //             $('#up_price_validate').empty().html(error.price);
            //             $('#up_quantity_validate').empty().html(error.qty);
            //             $('#up_short_validate').empty().html(error.short_description);
            //             $('#up_long_validate').empty().html(error.long_description);

            //             swal.fire({
            //                 title: "Failed",
            //                 text: "Something Went Wrong !",
            //                 icon: "error"
            //             })
            //         }
            //     });
            // });


            // Delete
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

                            url: "{{ url('admin/product') }}/" + id,
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

                                datatables.ajax.reload();
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