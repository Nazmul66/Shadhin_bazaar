@extends('backend.layout.master')

@push('title')
    Create Product
@endpush

@push('add-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css">
@endpush

@section('body-content')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Content part Start -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">Products List</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">
                    Create Product
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0" id="categoryTable">
                    <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Category Image</th>
                            <th>Category Name</th>
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
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="createForm" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="thumb_image" class="form-label">Product Image </label>
                                    <input type="file" class="form-control" name="thumb_image" id="thumb_image" >

                                    <span id="image_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Write product name....">

                                    <span id="name_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="sku" class="form-label">Product Sku</label>
                                    <input class="form-control" id="sku" type="text" name="sku" placeholder="Write product sku....">

                                    <span id="sku_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="category_id">Category</label>
                                    <select class="form-select" id="category_id" name="category_id">
                                        <option value="" disabled selected>Select</option>
                                        <option>Large select</option>
                                    </select>

                                    <span id="category_id_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="subCategory_id">SubCategory</label>
                                    <select class="form-select" id="subCategory_id" name="subCategory_id">
                                        <option value="" disabled selected>Select</option>
                                        <option>Large select</option>
                                    </select>

                                    <span id="subCategory_id_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="childCategory_id">ChildCategory</label>
                                    <select class="form-select" id="childCategory_id" name="childCategory_id">
                                        <option value="" disabled selected>Select</option>
                                        <option>Large select</option>
                                    </select>

                                    <span id="childCategory_id_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="brand_id">Brand</label>
                                    <select class="form-select" id="brand_id" name="brand_id">
                                        <option value="" disabled selected>Select</option>
                                        <option>Large select</option>
                                    </select>

                                    <span id="brand_id_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="price">Price</label>
                                    <input class="form-control" id="price" type="text" name="price" placeholder="Write price....">

                                    <span id="price_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="offer_price">Offer Price</label>
                                    <input class="form-control" id="offer_price" type="text" name="offer_price" placeholder="Write offer_price....">

                                    <span id="offer_price_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="qty">Stock Quantity</label>
                                    <input class="form-control" id="qty" type="text" name="qty" placeholder="Product Quantity....">

                                    <span id="quantity_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="offer_start_date">Offer Start Date</label>
                                    <input class="form-control" type="date" id="offer_start_date" name="offer_start_date">

                                    <span id="start_date_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="offer_end_date">Offer End Date</label>
                                    <input class="form-control" type="date" id="offer_end_date" name="offer_end_date">

                                    <span id="end_date_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="video_link">Video Link</label>
                                    <textarea class="form-control" id="video_link" name="video_link"  rows="4" placeholder="Link Paste Here...."></textarea>

                                    <span id="link_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="short">Short Description</label>
                                    <textarea class="form-control" id="short" class="" name="short_description" rows="4" placeholder="Short Description...."></textarea>

                                    <span id="short_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="long_description">Long Description</label>
                                    <textarea class="form-control" id="long_description" name="long_description" rows="8" placeholder="Long Description...."></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="is_featured">Is Featured</label>
                                    <select class="form-select" id="is_featured" name="is_featured">
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
    
                                    <span id="is_featured_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="is_top">Is Top</label>
                                    <select class="form-select" id="is_top" name="is_top">
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
    
                                    <span id="is_top_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="is_best">Is Best</label>
                                    <select class="form-select" id="is_best" name="is_best">
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
    
                                    <span id="is_best_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="seo_title">SEO Title</label>
                                    <input class="form-control" id="seo_title" type="text" name="seo_title" placeholder="Write SEO Title....">

                                    <span id="seo_title_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="seo_description">SEO Description</label>
                                    <input class="form-control" id="seo_description" type="text" name="seo_description" placeholder="Write SEO Description....">

                                    <span id="seo_description_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
    
                                    <span id="status_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-secondary waves-effect me-3"
                                    data-bs-dismiss="modal">Close</button>

                                <button type="submit" id="btn-store" class="btn btn-primary waves-effect waves-light">Save changes</button>
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
                        <h5 class="modal-title" id="myModalLabel">Update Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="EditForm" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <input type="text" name="id" id="id" hidden>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="thumb_image" class="form-label">Product Image </label>
                                    <input type="file" class="form-control" name="thumb_image" id="thumb_image" >

                                    <div id="showImage"></div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="up_name" class="form-label">Product Name</label>
                                    <input class="form-control" id="up_name" type="text" name="name" placeholder="Write product name....">

                                    <span id="up_name_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="up_sku" class="form-label">Product Sku</label>
                                    <input class="form-control" id="up_sku" type="text" name="sku" placeholder="Write product sku....">

                                    <span id="up_sku_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_category_id">Category</label>
                                    <select class="form-select" id="up_category_id" name="category_id">
                                        <option value="" disabled selected>Select</option>
                                        <option>Large select</option>
                                    </select>

                                    <span id="category_id_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_subCategory_id">SubCategory</label>
                                    <select class="form-select" id="up_subCategory_id" name="subCategory_id">
                                        <option value="" disabled selected>Select</option>
                                        <option>Large select</option>
                                    </select>

                                    <span id="subCategory_id_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_childCategory_id">ChildCategory</label>
                                    <select class="form-select" id="up_childCategory_id" name="childCategory_id">
                                        <option value="" disabled selected>Select</option>
                                        <option>Large select</option>
                                    </select>

                                    <span id="childCategory_id_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_brand_id">Brand</label>
                                    <select class="form-select" id="up_brand_id" name="brand_id">
                                        <option value="" disabled selected>Select</option>
                                        <option>Large select</option>
                                    </select>

                                    <span id="brand_id_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_price">Price</label>
                                    <input class="form-control" id="up_price" type="text" name="price" placeholder="Write price....">

                                    <span id="up_price_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_offer_price">Offer Price</label>
                                    <input class="form-control" id="up_offer_price" type="text" name="offer_price" placeholder="Write offer_price....">

                                    <span id="up_offer_price_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_qty">Stock Quantity</label>
                                    <input class="form-control" id="up_qty" type="number" name="qty" placeholder="Product Quantity....">

                                    <span id="up_quantity_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_offer_start_date">Offer Start Date</label>
                                    <input class="form-control" type="date" id="up_offer_start_date" name="offer_start_date">

                                    <span id="up_start_date_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_offer_end_date">Offer End Date</label>
                                    <input class="form-control" type="date" id="up_offer_end_date" name="offer_end_date">

                                    <span id="up_end_date_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="up_video_link">Video Link</label>
                                    <textarea class="form-control" id="up_video_link" name="video_link"  rows="4" placeholder="Link Paste Here...."></textarea>

                                    <span id="up_link_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="up_short">Short Description</label>
                                    <textarea class="form-control" id="up_short" class="" name="short_description" rows="4" placeholder="Short Description...."></textarea>

                                    <span id="up_short_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="up_long_description">Long Description</label>
                                    <textarea class="form-control" id="up_long_description" name="long_description" rows="8" placeholder="Long Description...."></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_is_featured">Is Featured</label>
                                    <select class="form-select" id="up_is_featured" name="is_featured">
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
    
                                    <span id="is_featured_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_is_top">Is Top</label>
                                    <select class="form-select" id="up_is_top" name="is_top">
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
    
                                    <span id="is_top_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_is_best">Is Best</label>
                                    <select class="form-select" id="up_is_best" name="is_best">
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
    
                                    <span id="is_best_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_seo_title">SEO Title</label>
                                    <input class="form-control" id="up_seo_title" type="text" name="seo_title" placeholder="Write SEO Title....">

                                    <span id="up_seo_title_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_seo_description">SEO Description</label>
                                    <input class="form-control" id="up_seo_description" type="text" name="seo_description" placeholder="Write SEO Description....">

                                    <span id="up_seo_description_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_status">Status</label>
                                    <select class="form-select" id="up_status" name="status">
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
    
                                    <span id="up_status_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-secondary waves-effect me-3"
                                        data-bs-dismiss="modal">Close </button>

                                <button type="submit" id="btn-store" class="btn btn-primary waves-effect waves-light"> Save changes</button>
                            </div>
                        </form>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>

@endsection

@push('add-script')
    {{-- data.setData(res.data.schedules_desc); --}}
    <script src="{{asset('https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js')}}"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.min.js"></script>

    <script>

        $(document).ready(function () {

            let jReq;
            // Ckeditor 5
            ClassicEditor
                .create(document.querySelector('#long_description'))
                .then(newEditor => {
                    jReq = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            let data;
            // Ckeditor 5
            ClassicEditor
                .create(document.querySelector('#up_long_description'))
                .then(newEditor => {
                    data = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });


            // Show Data through Datatable
            let CategoryTables = $('#categoryTable').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,

                ajax: "{{ route('admin.category-data') }}",
                // pageLength: 30,

                columns: [
                    {
                        data: 'id',
                    },
                    {
                        data: 'categoryImg',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'category_name',
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
                    url: "{{ route('admin.category.status') }}",
                    data: {
                        // '_token': token,
                        id: id,
                        status: status
                    },
                    success: function (res) {
                        CategoryTables.ajax.reload();

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
                    url: "{{ route('admin.category.store') }}",
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        console.log(res);
                        if (res.status === true) {
                            $('#create_Modal').modal('hide');
                            $('#createForm')[0].reset();
                            CategoryTables.ajax.reload();

                            swal.fire({
                                title: "Success",
                                text: `${res.message}`,
                                icon: "success"
                            })
                        }
                    },
                    error: function (err) {
                        let error = err.responseJSON.errors;

                        $('#name_validate').empty().html(error.category_name);
                        $('#image_validate').empty().html(error.category_img);
                        $('#status_validate').empty().html(error.status);

                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                    }
                });
            })


            // Edit Category
            $(document).on("click", '#editButton', function (e) {
                let id = $(this).attr('data-id');
                // alert(id);

                $.ajax({
                    type: 'GET',
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    url: "{{ url('admin/categories') }}/" + id + "/edit",
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        let data = res.success;

                        $('#id').val(data.id);
                        $('#up_category_name').val(data.category_name);
                        $('#imageShow').html('');
                        $('#imageShow').append(`
                         <img src={{ asset("`+ data.category_img +`") }} alt="" style="width: 75px;">
                    `);
                        $('#up_status').val(data.status);
                    },
                    error: function (error) {
                        console.log('error');
                    }

                });
            })


            // Update Category
            $("#EditForm").submit(function (e) {
                e.preventDefault();

                let id = $('#id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/categories') }}/" + id,
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {

                        swal.fire({
                            title: "Success",
                            text: "Category Edited",
                            icon: "success"
                        })

                        $('#editModal').modal('hide');
                        $('#EditCategory')[0].reset();
                        CategoryTables.ajax.reload();
                    },
                    error: function (err) {
                        let error = err.responseJSON.errors;

                        $('#up_name_validate').empty().html(error.category_name);

                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                    }
                });

            });


            // Delete Category
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

                            url: "{{ url('admin/categories') }}/" + id,
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

                                CategoryTables.ajax.reload();
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

