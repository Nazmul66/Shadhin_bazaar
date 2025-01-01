@extends('backend.layout.master')

@push('title')
    List Product
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
                <h4 class="mb-sm-0 font-size-18">Product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboards') }}">Dashboard</a></li>
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
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                    Add New
                </a>
            </div>
        </div>
        
        <div class="card-body">
           <table id="inputTable">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Name</th>
                    <th>Data</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody class="table-border-bottom-0" id="data-table">
                <tr>
                    <td>
                        <input type="text" class="form-control" name="name[]" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="data[]" required>
                    </td>
                    <td>
                        <select name="dropdown" class="form-control dropdown-select" required>
                            <option value="" disabled selected>Select Option</option>
                            <option value="Analytics" data-name="Analytics">Analytics</option>
                            <option value="Python" data-name="Python">Python</option>
                            <option value="CrawlBar" data-name="CrawlBar">Crawl Bar</option>
                        </select>
                    </td>
                </tr>
            </tbody>
           </table>
        </div>

        <div class="card-body">
            <div class="">
                <table class="table table-bordered mb-0" id="datatables">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#SL.</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Product Categorized</th>
                            <th>Special Featured</th>
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
        {{-- <div id="createModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true"
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
                
                            <div class="row align-items-end">
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex gap-3 align-items-end">
                                        <div id="image_preview">
                                            <img src="{{ asset('public/backend/assets/images/no_Image_available.jpg') }}" width="100" height="100">
                                        </div>
                
                                        <div class="">
                                            <label for="thumb_image" class="form-label">Product Image <sup class="text-danger" style="font-size: 12px;">* resolution (520 x 680)</sup></label>
                                            <input type="file" class="form-control" name="thumb_image" id="thumb_image" accept=".png, .jpeg, .jpg, .webp" onchange="previewImage(event)">
                                        </div>
                                    </div>
                
                                    <span id="image_validate" class="text-danger mt-1"></span>
                                </div>
                
                                <div class="col-md-4 mb-3">
                                    <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Write product name....">
                
                                    <span id="name_validate" class="text-danger mt-1"></span>
                                </div>
                
                                <div class="col-md-4 mb-3">
                                    <label for="sku" class="form-label">Product Sku <span class="text-danger">*</span></label>
                                    <input class="form-control" id="sku" type="text" name="sku" placeholder="Write product sku....">
                                </div>
                            </div>
                
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="category_id">Category <span class="text-danger">*</span></label>
                                    <select class="form-select category_id" id="category_id" name="category_id">
                                        <option value="" disabled selected>Select</option>
                
                                        @foreach ($categories as $row)
                                             <option value="{{ $row->id }}" data-image-url="{{ asset($row->category_img) }}">{{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                
                                    <span id="category_id_validate" class="text-danger mt-1"></span>
                                </div>
            
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="subCategory_id">SubCategory <span class="text-danger">*</span></label>
                                    <select class="form-select subCategory_id" id="subCategory_id" name="subCategory_id">
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($subCategories as $row)
                                            <option value="{{ $row->id }}" data-image-url="{{ asset($row->subcategory_img) }}">{{ $row->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="childCategory_id">ChildCategory</label>
                                    <select class="form-select childCategory_id" id="childCategory_id" name="childCategory_id">
                                        <option value="" disabled selected>Select</option>
                
                                        @foreach ($childCategories as $row)
                                            <option value="{{ $row->id }}" data-image-url="{{ asset($row->img) }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="brand_id">Brand <span class="text-danger">*</span></label>
                                    <select class="form-select" id="brand_id" name="brand_id">
                                        <option value="" disabled selected>Select</option>
                
                                        @foreach ($brands as $row)
                                            <option value="{{ $row->id }}" data-image-url="{{ asset($row->image) }}">{{ $row->brand_name }}</option>
                                        @endforeach
                                    </select>
                
                                    <span id="brand_id_validate" class="text-danger mt-1"></span>
                                </div>
                
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="price">Purchase Price <span class="text-danger">*</span></label>
                                    <input class="form-control" id="price" type="number" name="price" min="0" placeholder="Write price....">
                
                                    <span id="price_validate" class="text-danger mt-1"></span>
                                </div>
            
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="offer_price">Selling Price</label>
                                    <input class="form-control" id="offer_price" type="number" name="offer_price" min="0"  placeholder="Write offer_price....">
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="discount_type">Discount Type</label>
                                    <select class="form-select" id="discount_type" name="discount_type">
                                        <option value="none" selected>Select Discount Type</option>
                                        <option value="amount">Amount ( TK )</option>
                                        <option value="percent">Percent ( % )</option>
                                    </select>
                                </div>
                
                                <div class="col-md-4 mb-3 discount_value d-none">
                                    <label class="form-label" for="discount_value">Discount Value</label>
                                    <input class="form-control" type="number" id="discount_value" name="discount_value"  placeholder="Discount Value....">
                                </div>
            
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="qty">Stock Quantity <span class="text-danger">*</span></label>
                                    <input class="form-control" min="0" id="qty" type="number" name="qty" placeholder="Product Quantity....">
                
                                    <span id="quantity_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="offer_start_date">Offer Start Date</label>
                                    <input class="form-control offer_start_date" type="date" id="offer_start_date" name="offer_start_date" placeholder="Select a date....">
                                </div>
                
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="offer_end_date">Offer End Date</label>
                                    <input class="form-control offer_end_date" type="date" id="offer_end_date" name="offer_end_date"  placeholder="Select a date....">
                                </div>
                            </div>
                
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="video_link">Video Link</label>
                                    <textarea class="form-control" id="video_link" name="video_link"  rows="7" placeholder="Link Paste Here...."></textarea>
                                </div>
                
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="short">Short Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="short" class="" name="short_description" rows="7" placeholder="Short Description...."></textarea>
                
                                    <span id="short_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>
                
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="long_description">Long Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="long_description" name="long_description" rows="8" placeholder="Long Description...."></textarea>
                                </div>
                
                                <span id="long_validate" class="text-danger mt-1"></span>
                            </div>
            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="return_policy">Return Policy </label>
                                    <textarea class="form-control" id="return_policy" name="return_policy" rows="8" placeholder="Return Policy...."></textarea>
                                </div>
                
                                <span id="long_validate" class="text-danger mt-1"></span>
                            </div>
            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="shipping_return">Shipping Return</label>
                                    <textarea class="form-control" id="shipping_return" name="shipping_return" rows="8" placeholder="Shipping Return...."></textarea>
                                </div>
                
                                <span id="long_validate" class="text-danger mt-1"></span>
                            </div>
                
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="product_size"><strong>Multiple Products Tag</strong></label>
                                <input type="text" class="product-tags" name="tags" />
                            </div>
                
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="type">Product Type</label>
                                    <select class="form-select" id="type" name="type">
                                        <option value="" disabled selected>Select</option>
                                        <option value="new_arrived">New Arrived</option>
                                        <option value="featured">Featured</option>
                                        <option value="best">Best</option>
                                        <option value="top">Top</option>
                                    </select>
                                </div>
                
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="is_featured">Is Featured</label>
                                    <select class="form-select" id="is_featured" name="is_featured">
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="is_top">Is Top</label>
                                    <select class="form-select" id="is_top" name="is_top">
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="is_best">Is Best</label>
                                    <select class="form-select" id="is_best" name="is_best">
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="seo_title">SEO Title</label>
                                    <input class="form-control" id="seo_title" type="text" name="seo_title" placeholder="Write SEO Title....">
                                </div>
                
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="seo_description">SEO Description</label>
                                    <input class="form-control" id="seo_description" type="text" name="seo_description" placeholder="Write SEO Description....">
                                </div>
                            </div>
                
                            <div class="d-flex justify-content-center align-items-center mt-5">
                                <button type="submit" id="btn-store" class="btn btn-primary waves-effect waves-light">Save changes</button>
                            </div>
                        </form>
                    </div>


                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div> --}}


        <!-- Edit Modal -->
        {{-- <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
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
                                    <label for="thumb_image" class="form-label">Product Image <sup class="text-danger" style="font-size: 12px;">* resolution (200 x 320)</sup></label>
                                    <input type="file" class="form-control" name="thumb_image" id="thumb_image" >

                                    <div id="imageShow"></div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="up_name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="up_name" type="text" name="name" placeholder="Write product name....">

                                    <span id="up_name_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="up_sku" class="form-label">Product Sku</label>
                                    <input class="form-control" id="up_sku" type="text" name="sku" placeholder="Write product sku....">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_category_id">Category <span class="text-danger">*</span></label>
                                    <select class="form-select category_id" id="up_category_id"  name="category_id">
                                        <option value="" disabled selected>Select</option>

                                        @foreach ($categories as $row)
                                             <option value="{{ $row->id }}" data-image-url="{{ asset($row->category_img) }}">{{ $row->category_name }}</option>
                                        @endforeach
                                    </select>

                                    <span id="up_category_id_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_subCategory_id">SubCategory</label>
                                    <select class="form-select subCategory_id" id="up_subCategory_id" name="subCategory_id">
                                        <option value="" disabled selected>Select</option>

                                        @foreach ($subCategories as $row)
                                            <option value="{{ $row->id }}" data-image-url="{{ asset($row->subcategory_img ) }}">{{ $row->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_childCategory_id">ChildCategory</label>
                                    <select class="form-select childCategory_id" id="up_childCategory_id" name="childCategory_id">
                                        <option value="" disabled selected>Select</option>

                                        @foreach ($childCategories as $row)
                                            <option value="{{ $row->id }}" data-image-url="{{ asset($row->img) }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_brand_id">Brand <span class="text-danger">*</span></label>
                                    <select class="form-select" id="up_brand_id" name="brand_id">
                                        <option value="" disabled selected>Select</option>

                                        @foreach ($brands as $row)
                                            <option value="{{ $row->id }}" data-image-url="{{ asset($row->image) }}">{{ $row->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_price">Price <span class="text-danger">*</span></label>
                                    <input class="form-control" id="up_price" type="text" name="price" placeholder="Write price....">

                                    <span id="up_price_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_offer_price">Offer Price</label>
                                    <input class="form-control" id="up_offer_price" type="text" name="offer_price" placeholder="Write offer_price....">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_qty">Stock Quantity <span class="text-danger">*</span></label>
                                    <input class="form-control" id="up_qty" type="number" name="qty" placeholder="Product Quantity....">

                                    <span id="up_quantity_validate" class="text-danger mt-1"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_offer_start_date">Offer Start Date</label>
                                    <input class="form-control up_offer_start_date" type="date" id="up_offer_start_date" name="offer_start_date" placeholder="Select a date">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_offer_end_date">Offer End Date</label>
                                    <input class="form-control up_offer_end_date" type="date" id="up_offer_end_date" name="offer_end_date" placeholder="Select a date">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="up_video_link">Video Link</label>
                                    <textarea class="form-control" id="up_video_link" name="video_link"  rows="4" placeholder="Link Paste Here...."></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="up_short">Short Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="up_short" class="" name="short_description" rows="4" placeholder="Short Description...."></textarea>

                                    <span id="up_short_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="up_long_description">Long Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="up_long_description" name="long_description" rows="8" placeholder="Long Description...."></textarea>

                                    <span id="up_long_validate" class="text-danger mt-1"></span>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="up_tags"><strong>Multiple Products Tag</strong></label>
                                <input type="text" class="up_product_tags" id="up_tags" name="tags" />
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_type">Product Type</label>
                                    <select class="form-select" id="up_type" name="type">
                                        <option value="" disabled selected>Select</option>
                                        <option value="new_arrived">New Arrived</option>
                                        <option value="featured">Featured</option>
                                        <option value="best">Best</option>
                                        <option value="top">Top</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_is_featured">Is Featured</label>
                                    <select class="form-select" id="up_is_featured" name="is_featured">
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_is_top">Is Top</label>
                                    <select class="form-select" id="up_is_top" name="is_top">
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_is_best">Is Best</label>
                                    <select class="form-select" id="up_is_best" name="is_best">
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_seo_title">SEO Title</label>
                                    <input class="form-control" id="up_seo_title" type="text" name="seo_title" placeholder="Write SEO Title....">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="up_seo_description">SEO Description</label>
                                    <input class="form-control" id="up_seo_description" type="text" name="seo_description" placeholder="Write SEO Description....">
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
        </div> --}}
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

    {{-- New Drop select Option --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dataTable = document.getElementById('data-table');

            // Event listener for dropdown changes
            dataTable.addEventListener('change', function (event) {
                if (event.target.classList.contains('dropdown-select')) {
                    const selectedOption = event.target.options[event.target.selectedIndex];
                    const selectedValue = selectedOption.value; // Get the value of the selected option
                    const selectedName = selectedOption.dataset.name; // Get the data-name attribute

                    // Append the data dynamically as a new row
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <td>
                            <input type="text" class="form-control" name="name[]" value="${selectedName}" readonly>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="data[]" value="Default Data" required>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-row">Remove</button>
                        </td>
                    `;
                    dataTable.appendChild(newRow);

                    // Disable the selected option in all dropdowns
                    const dropdowns = document.querySelectorAll('.dropdown-select');
                    dropdowns.forEach(dropdown => {
                        const optionToDisable = dropdown.querySelector(`option[value="${selectedValue}"]`);
                        if (optionToDisable) optionToDisable.disabled = true;
                    });

                    // Reset the current dropdown after selection
                    event.target.value = "";
                }
            });

            // Event listener for removing rows
            dataTable.addEventListener('click', function (event) {
                if (event.target.classList.contains('remove-row')) {
                    const row = event.target.closest('tr');
                    const removedValue = row.querySelector('input[name="name[]"]').value;

                    // Re-enable the option in all dropdowns
                    const dropdowns = document.querySelectorAll('.dropdown-select');
                    dropdowns.forEach(dropdown => {
                        const optionToEnable = dropdown.querySelector(`option[value="${removedValue}"]`);
                        if (optionToEnable) optionToEnable.disabled = false;
                    });

                    // Remove the row
                    row.remove();
                }
            });
        });
    </script>

    <script>
     $(document).ready(function () {

        // Choice.js plugin
        // const product_tags = new Choices('.product-tags',{
        //     removeItems: true,
        //     duplicateItemsAllowed: false,
        //     removeItemButton: true,
        //     delimiter: ',',
        // });

        // let tagChoices = new Choices('.up_product_tags',{
        //     removeItems: true,
        //     duplicateItemsAllowed: false,
        //     removeItemButton: true,
        //     delimiter: ',',
        // });


        // Ckeditor 5 plugin
        // let jReq;
        // ClassicEditor
        //     .create(document.querySelector('#long_description'))
        //     .then(newEditor => {
        //         jReq = newEditor;
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });


        //     let longDescriptionEditor;
        //     ClassicEditor
        //         .create(document.querySelector('#up_long_description'))
        //         .then(newEditor => {
        //             longDescriptionEditor = newEditor; // Store the editor instance
        //         })
        //         .catch(error => {
        //             console.error(error);
        //     });

            // function previewImage(event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = e => document.getElementById('image_preview').innerHTML = `
            //         <img src="${e.target.result}" width="100" height="100">`;
            //         reader.readAsDataURL(file);
            //     }
            // }

            // $('#discount_type').on('change', function () {
            //     const selectedValue = $(this).val();
                
            //     if (selectedValue === 'amount' || selectedValue === 'percent') {
            //         $('.discount_value').removeClass('d-none'); // Show the discount_value div
            //     } else {
            //         $('.discount_value').addClass('d-none'); // Hide the discount_value div
            //     }
            // });

            // // Fetching subcategory information
            // $(document).on('input', '.category_id', function(){
            //     var category_id = $(this).val();
            //     // console.log(category_id);

            //     $.ajax({
            //         type: "POST",
            //         url: "{{ route('admin.get.product.subCategory.data') }}",
            //         data: {
            //             id: category_id
            //         },
            //         success: function (res) {
            //             console.log(res.data);
            //             if (res.status) {
            //                 // Clear any previous subcategory options
            //                 $('.subCategory_id').empty();
            //                 // Add default "Select" option
            //                 $('.subCategory_id').append('<option value="" disabled selected>Select</option>');

            //                 // Append new subcategories with images
            //                 $.each(res.data, function (key, subCategory) {
            //                     var option = '<option value="' + subCategory.id + '" data-image-url="' + subCategory.image_url + '">' + subCategory.subcategory_name + '</option>';
            //                     $('.subCategory_id').append(option);
            //                 });


            //                 // Trigger select2 to reinitialize so the images appear
            //                 $('#subCategory_id').select2({
            //                     dropdownParent: $('#createModal'),
            //                     templateResult: formatState,
            //                     templateSelection: formatState,
            //                 });
            //             }
            //         },
            //         error: function (err) {
            //             console.log(err);
            //         }

            //     })
            // })


            //  // Fetching Child-subcategory information
            //  $(document).on('input', '.subCategory_id', function(){
            //     var subCategory_id = $(this).val();
            //     // console.log(category_id);

            //     $.ajax({
            //         type: "POST",
            //         url: "{{ route('admin.get.product.childCategory.data') }}",
            //         data: {
            //             id: subCategory_id
            //         },
            //         success: function (res) {
            //             console.log(res.data);
            //             if (res.status) {
            //                 // Clear any previous subcategory options
            //                 $('.childCategory_id').empty();
            //                 // Add default "Select" option
            //                 $('.childCategory_id').append('<option value="" disabled selected>Select</option>');

            //                 // Append new subcategories with images
            //                 $.each(res.data, function (key, childCategory) {
            //                     var option = '<option value="' + childCategory.id + '" data-image-url="' + childCategory.image_url + '">' + childCategory.name + '</option>';
            //                     $('.childCategory_id').append(option);
            //                 });


            //                 // Trigger select2 to reinitialize so the images appear
            //                 $('#childCategory_id').select2({
            //                     dropdownParent: $('#createModal'),
            //                     templateResult: formatState,
            //                     templateSelection: formatState,
            //                 });
            //             }
            //         },
            //         error: function (err) {
            //             console.log(err);
            //         }

            //     })
            // })


            // Show Data through Datatable
            let datatables = $('#datatables').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,

                ajax: "{{ route('admin.product-data') }}",
                // pageLength: 30,

                columns: [
                    { 
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex', 
                        orderable: false, 
                        searchable: false 
                    },
                    {
                        data: 'product_img',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'product_details',
                    },
                    {
                        data: 'quantity',
                    },
                    {
                        data: 'categorized',
                    },
                    {
                        data: 'special_featured',
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
                    url: "{{ route('admin.product.status') }}",
                    data: {
                        // '_token': token,
                        id: id,
                        status: status
                    },
                    success: function (res) {
                        datatables.ajax.reload();

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
            // $('#createForm').submit(function (e) {
            //     e.preventDefault();

            //     let formData = new FormData(this);

            //     $.ajax({
            //         type: "POST",
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         url: "{{ route('admin.product.store') }}",
            //         data: formData,
            //         processData: false,  // Prevent jQuery from processing the data
            //         contentType: false,  // Prevent jQuery from setting contentType
            //         success: function (res) {
            //             console.log(res);
            //             if (res.status === true) {
            //                 $('#createModal').modal('hide');
            //                 $('#createForm')[0].reset();
            //                 datatables.ajax.reload();

            //                 swal.fire({
            //                     title: "Success",
            //                     text: `${res.message}`,
            //                     icon: "success"
            //                 })
            //             }
            //         },
            //         error: function (err) {
            //             let error = err.responseJSON.errors;

            //             $('#image_validate').empty().html(error.thumb_image);
            //             $('#name_validate').empty().html(error.name);
            //             $('#category_id_validate').empty().html(error.category_id);
            //             $('#brand_id_validate').empty().html(error.brand_id);
            //             $('#price_validate').empty().html(error.price);
            //             $('#quantity_validate').empty().html(error.qty);
            //             $('#short_validate').empty().html(error.short_description);
            //             $('#long_validate').empty().html(error.long_description);
            //             $('#is_featured_validate').empty().html(error.is_featured);
            //             $('#is_top_validate').empty().html(error.is_top);
            //             $('#is_best_validate').empty().html(error.is_best);
            //             $('#status_validate').empty().html(error.status);

            //             swal.fire({
            //                 title: "Failed",
            //                 text: "Something Went Wrong !",
            //                 icon: "error"
            //             })
            //         }
            //     });
            // })


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

