@extends('backend.layout.master')

@push('title')
    List Product Variation
@endpush

@push('add-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush

@section('body-content')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Product Variant List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboards') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Product Variant</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Content part Start -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">Products Variant List</h4>
                <a href="{{ route('admin.product.index') }}" class="btn btn-primary waves-effect waves-light"> Back</a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.product.images.store', $id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                {{-- Multiple Product Image --}}
                <div class="multiple-image">
                    <label class="file_div" for="fileUploader">
                        {{-- <h2>Upload</h2> --}}
                        <img src="{{ asset('public/backend/images/Upload_icon.png') }}" alt="" class="img_upload">
                        <h3>Upload Files or <span>Browse</span></h3>
                        <p>Supported formates: JPEG, PNG, JPG</p>
                        <figcaption class="file_name d-none" ></figcaption>

                        <div id="previewContainer" class="preview-container d-flex flex-wrap gap-2 mt-3"></div>
                    </label>
                    <input type="file" class="d-none" id="fileUploader" accept=".jpg, .png, .jpeg, .webp" name="images[]" multiple >
                    
                    <div class="row mt-3" id="sortable">
                        @foreach ($productImages as $item)
                            <div class="images_container image_sortable" id="image-{{ $item->id }}" data-id="{{ $item->id }}">
                                <img src="{{ asset($item->images) }}" alt="">
                                <a  href="javascript:void(0);" class="delete-image" data-id="{{ $item->id }}">
                                    <i class='bx bx-x x-image'></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary waves-effect waves-light mt-4"> Update</button>
            </form>

            {{-- All Product Size And Product Color --}}
            <form action="{{ route('admin.product-variant.update', $id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="row mt-5">
                    {{-- Product Size --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="product_size"><strong>Product Size</strong> <span class="text-danger">*</span></label>

                        <div class="table-responsive text-nowrap mb-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price ($)</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
    
                                <tbody class="table-border-bottom-0 table_extend">
                                    @foreach ($productSizes as $row => $item)
                                        <tr data-value={{ $row }}>
                                            <td>
                                                <input type="text" class="form-control" value="{{ $item->size_name }}" name="size_name[]" readonly required>
                                            </td>
                                            <td>
                                                <input type="number" value="{{ $item->size_price }}" min="0" class="form-control" name="size_price[]" required>
                                            </td>
                                            <td>
                                                <input type="number" value="{{ $item->stock }}" min="0" class="form-control" name="stock[]" required>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.product-size.delete', $item->id) }}" type="submit" class="btn btn-danger">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            <select class="form-select" id="product_size">
                                                <option value="" disabled selected>Select Product Size</option>
                                                @foreach ($size_value as $item)
                                                    <option value="{{ $item->value }}">{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    {{-- Product Color --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="product_color"><strong>Product Color</strong> <span class="text-danger">*</span></label>

                        <div class="table-responsive text-nowrap mb-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Color</th>
                                        <th>Price ($)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody class="table-border-bottom-0 color_table_extend">
                                    @foreach ($productColors as $row => $item)
                                        <tr data-value="{{ $row }}">
                                            <td>
                                                <input type="text" class="form-control" value="{{ $item->color_name }}" name="color_name[]" readonly required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="{{ $item->color_price }}" name="color_price[]" required>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.product-color.delete', $item->id) }}" class="btn btn-danger">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="3">
                                            <select class="form-select" id="product_color">
                                                <option value="" disabled selected>Select Product Color</option>
                                                @foreach ($color_value as $item)
                                                    <option value="{{ $item->value }}">{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

              <button type="submit" class="btn btn-primary waves-effect waves-light"> Update</button>
            </form>
        </div>
    </div>

@endsection

@push('add-script')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    
{{-- This is for product size setup select2 dropdown --}}
<script>   

$(document).ready(function() {

    // Image Sortable System
    $( "#sortable" ).sortable({
        update : function(event, ui){
            var photo_id = [];
           $('.image_sortable').each(function(){
               var id = $(this).data('id');
               photo_id.push(id);
            })
            // console.log(photo_id);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.product.images.sortable') }}",
                data: {
                    // '_token': token,
                    photo_id: photo_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (res) {
                     console.log(res.status);
                     if( res.status == 'success' ){
                          console.log('nice')
                     }
                },

                error: function (err) {
                    console.log(err);
                }
            })
        }
    });

    // Multi Image delete
    $(document).on('click', '.delete-image', function () {
        const imageId = $(this).data('id');
        const imageContainer = $(`#image-${imageId}`);

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
                    // Remove the image container immediately
                    imageContainer.fadeOut('fast', function () {
                        $(this).remove();
                    });

                    // Send the AJAX request
                    $.ajax({
                        url: "{{ url('admin/multiple-image/delete') }}/" + imageId,
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}" // Include CSRF token for security
                        },
                        success: function (response) {
                            if (!response.success) {
                                alert(response.message);
                            }
                        },
                        error: function () {
                            alert('An error occurred. Please try again.');
                            // Reinsert the container if deletion fails
                            $('body').append(imageContainer);
                        }
                    });
                } 
                else {
                    swal.fire('Your Data is Safe');
                }
            })
    });

    // Disable already selected sizes on page load
    @foreach($productSizes as $item)
        var selectedSize = "{{ $item->size_name }}";
        var option = $('#product_size').find('option[value="' + selectedSize + '"]');
        option.prop('disabled', true);  // Disable the option in Select2
    @endforeach


    // Initialize Select2 plugin
    $('#product_size').select2();


    // When a new value is selected
    $('#product_size').on('select2:select', function (e) {
        var selectedValue = e.params.data.id; // Get the selected value (ID)

        // Disable the selected option in the dropdown
        var option = $('#product_size').find('option[value="' + selectedValue + '"]');
        option.prop('disabled', true);

        // Trigger the Select2 to refresh the dropdown options
        $('#product_size').select2();

        // Append the new size row to the table
        $('.table_extend').append(`
            <tr data-value="${selectedValue}">
                <td>
                    <input type="text" class="form-control" value="${selectedValue}" name="size_name[]" readonly required>
                </td>
                <td>
                    <input type="number" min="0" value="0" class="form-control" name="size_price[]" required>
                </td>
                <td>
                    <input type="number" min="0" value="0" class="form-control" name="stock[]" required>
                </td>
                <td>
                    <button type="button" class="btn btn-danger">Remove</button>
                </td>
            </tr>
        `);

        // Reset the select dropdown after a value is appended
        $('#product_size').val('').trigger('change');
    });

    // Handle removal of a row and re-enable the option
    $(document).on('click', '.btn-danger', function() {
        var row = $(this).closest('tr');  // Find the closest row (tr)
        var removedValue = row.data('value'); // Get the value from the row

        // Re-enable the option in the select dropdown
        var option = $('#product_size').find('option[value="' + removedValue + '"]');
        option.prop('disabled', false);

        // Refresh the select2 dropdown to reflect the changes
        $('#product_size').select2();

        // Remove the row from the table
        row.remove();
    });
});
</script>


<script>
    $(document).ready(function() {
        // Disable already selected colors on page load
        @foreach($productColors as $item)
            var selectedColor = "{{ $item->color_name }}";
            var optionColor = $('#product_color').find('option[value="' + selectedColor + '"]');
            optionColor.prop('disabled', true);  // Disable the option in Select2
        @endforeach
    
        // Initialize Select2 plugin for color dropdown
        $('#product_color').select2();
    
        // When a new value is selected in product color
        $('#product_color').on('select2:select', function (e) {
            var selectedColorValue = e.params.data.id; // Get the selected value (ID)
    
            // Disable the selected option in the dropdown
            var optionColor = $('#product_color').find('option[value="' + selectedColorValue + '"]');
            optionColor.prop('disabled', true);
    
            // Trigger the Select2 to refresh the dropdown options
            $('#product_color').select2();
    
            // Append the new color row to the table
            $('.color_table_extend').append(`
                <tr data-value="${selectedColorValue}">
                    <td>
                        <input type="text" class="form-control" value="${selectedColorValue}" name="color_name[]" readonly >
                    </td>
                    <td>
                        <input type="text" class="form-control" value="0" name="color_price[]" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger">Remove</button>
                    </td>
                </tr>
            `);
    
            // Reset the select dropdown after a value is appended
            $('#product_color').val('').trigger('change');
        });
    
        // Handle removal of a row and re-enable the option in product color
        $(document).on('click', '.btn-danger', function() {
            var row = $(this).closest('tr');  // Find the closest row (tr)
            var removedColorValue = row.data('value'); // Get the value from the row
    
            // Re-enable the option in the select dropdown
            var optionColor = $('#product_color').find('option[value="' + removedColorValue + '"]');
            optionColor.prop('disabled', false);
    
            // Refresh the select2 dropdown to reflect the changes
            $('#product_color').select2();
    
            // Remove the row from the table
            row.remove();
        });
    });
</script>



  {{-- Multiple Image realtime select and delete also --}}
<script>
    let selectedFiles = []; // Array to manage selected files

    document.getElementById('fileUploader').addEventListener('change', function (event) {
        const previewContainer = document.getElementById('previewContainer');
        const files = Array.from(event.target.files);

        files.forEach((file) => {
            // Add the new files to the selectedFiles array
            selectedFiles.push(file);

            // Generate preview for the file
            const reader = new FileReader();
            reader.onload = function (e) {
                const imagePreview = document.createElement('div');
                imagePreview.classList.add('image-preview');

                imagePreview.innerHTML = `
                    <img src="${e.target.result}" alt="Image Preview" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;"> <br />
                    <button type="button" class="btn btn-danger btn-sm remove-image mt-2">Remove</button>
                `;

                // Append the preview to the container
                previewContainer.appendChild(imagePreview);

                // Add event listener to the remove button
                imagePreview.querySelector('.remove-image').addEventListener('click', function () {
                    const index = selectedFiles.indexOf(file);
                    if (index > -1) {
                        selectedFiles.splice(index, 1); // Remove file from the array
                    }
                    imagePreview.remove(); // Remove the preview element
                    updateFileInput();
                });
            };
            reader.readAsDataURL(file);
        });

        // Clear the file input to allow re-selection
        event.target.value = '';
    });

    // Update the file input with the remaining files
    function updateFileInput() {
        const dataTransfer = new DataTransfer(); // Create a new DataTransfer object

        selectedFiles.forEach((file) => {
            dataTransfer.items.add(file); // Add each remaining file
        });

        document.getElementById('fileUploader').files = dataTransfer.files; // Set the updated file list
}
</script>

@endpush

