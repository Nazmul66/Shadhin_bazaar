@extends('backend.layout.master')

@push('title')
    Create Product Variation
@endpush

@push('add-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('body-content')

    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Product Variant</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboards') }}">Dashboard</a></li>
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
            <form action="{{ route('admin.product-variant.update', $id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")


                {{-- Multiple Product Image --}}
                <div class="multiple-image">
                    <input type="file" class="form-control" name="images[]" multiple >
                    
                    <div class="row mt-3">
                        @foreach ($productImages as $item)
                            <div class="images_container">
                                <img src="{{ asset($item->images) }}" alt="">
                                <a href="{{ route('admin.multiple-image.delete', $item->id) }}">
                                    <i class='bx bx-x x-image'></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>


                {{-- Product Size --}}
                <div class="">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="product_size">Product Size</label>

                            <div class="table-responsive text-nowrap mb-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price ($)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
        
                                    <tbody class="table-border-bottom-0 table_extend">

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th colspan="4">
                                                <select class="form-select" id="product_size">
                                                    <option value="" disabled selected>Select Product Size</option>
                                                    @foreach ($size_value as $item)
                                                        <option value="{{ $item->attribute_value }}">{{ $item->attribute_value }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>

                <button type="submit" class="btn btn-primary waves-effect waves-light mt-5">
                    Update</button>
            </form>
        </div>
    </div>

@endsection

@push('add-script')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
<script>
        
$(document).ready(function() {
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
                    <input type="text" class="form-control" value="${selectedValue}" name="size_value[]" readonly required>
                </td>
                <td>
                    <input type="number" min="0" class="form-control" name="size_price[]" required>
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

@endpush

