@extends('theme.theme')
@section('title')
    Add Product
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('purchase_invoice')
    active
@endsection
@section('content')
    <div class="content">
        <form action="{{ route('purchase-invoices.store') }}" method="post">
            @csrf
                <div class="row">
                    <div class=" col-2">
                        <label for="purchase_number" class="form-lable" style="font-size: 14px">Purchase Number</label>
                        <input type="text" name="purchase_number" id="purchase_number" value="" disabled class="form-control form-control-sm">
                    </div>
                    <div class=" col-2">
                        <label for="purchase_date" class="form-lable" style="font-size: 14px">Purchase Date</label>
                        <input type="text" name="purchase_date" id="purchase_date" value="" class="form-control form-control-sm" placeholder="dd-mm-yyyy">
                    </div>
                    <div class=" col-8">
                        <label for="supplier_id" class="form-lable" style="font-size: 14px">Supplier</label>
                        <input type="text" name="supplier_id" id="supplier_id" value="" class="form-control form-control-sm">
                    </div>
                    <div class=" col-12">
                        <label for="supplier_address" class="form-lable" style="font-size: 14px">Supplier Address</label>
                        <input type="text" name="supplier_address" id="supplier_address" value="" class="form-control form-control-sm" disabled>
                    </div>
                    <div class=" col-3">
                        <label for="supplier_bill_number" class="form-lable" style="font-size: 14px">Supplier Bill Number</label>
                        <input type="text" name="supplier_bill_number" id="supplier_bill_number" value="" class="form-control form-control-sm" >
                    </div>
                    <div class=" col-3">
                        <label for="supplier_bill_date" class="form-lable" style="font-size: 14px">Supplier Bill Date</label>
                        <input type="text" name="supplier_bill_date" id="supplier_bill_date" value="" class="form-control form-control-sm" >
                    </div>
                    <div class=" col-3">
                        <label for="difference_in_bill_amount" class="form-lable" style="font-size: 14px">Difference</label>
                        <input type="number" name="difference_in_bill_amount" id="difference_in_bill_amount" value="" class="form-control form-control-sm" disabled>
                    </div>
                    <div class=" col-3">
                        <label for="bill_amount" class="form-lable" style="font-size: 14px">Bill Amount</label>
                        <input type="number" name="bill_amount" id="bill_amount" value="" class="form-control form-control-sm" >
                    </div>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped table-vcente">
                        <thead>
                            <tr class="text-center">
                                <th style="min-width:350px"></th>
                                <th style="min-width:220px" class="text-danger">Last Purchase Prices</th>
                                <th style="min-width:150px" class="text-success">This Invoice Purchase Price Packet</th>
                                <th style="min-width:150px" class="text-info">This Invoice Purchase Price unit</th>
                                <th style="min-width: 180px" class="text-primary">Bonuses</th>
                                <th style="min-width:70px"></th>
                                <th style="min-width: 190px" class="text-warning">Last Sale Prices</th>
                                <th style="min-width:70px"></th>
                                <th style="min-width:210px" class="text-secondary">New Sale Prices</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered table-striped table-vcente" id="productTable">
                        <thead>
                            <tr>
                                <th style="font-size:10px">Sr.</th>
                                <th class="d-none d-md-table-cell text-center" style="min-width:250px;font-size:10px">Product Name</th>
                                <th style="font-size:10px">Packing</th>
                                <th style="min-width:100px;font-size:10px" class="text-danger">Packet</th>
                                <th style="min-width:100px;;font-size:10px" class="text-danger">Unit</th>
                                <th style="font-size:10px" class="text-success">Quantity</th>
                                <th style="font-size:10px" class="text-success">Price</th>
                                <th style="font-size:10px" class="text-info">Quantity</th>
                                <th style="font-size:10px" class="text-info">Price</th>
                                <th style="font-size:10px" class="text-primary">Packet</th>
                                <th style="font-size:10px" class="text-primary">Unit</th>
                                <th style="font-size:10px" class="text-primary">Disc %</th>
                                <th style="font-size:10px">Amount</th>
                                <th style="min-width:100px;font-size:10px" class="text-warning">Packet</th>
                                <th style="min-width:100px;font-size:10px" class="text-warning">Unit</th>
                                <th style="font-size:10px">Margin%</th>
                                <th style="min-width:120px;font-size:10px" class="text-secondary">Packet</th>
                                <th style="min-width:120px; font-size:10px" class="text-secondary">Unit</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="form-group">
                                        {{-- <input type="text" name="product_search[]" class="form-control product-search" placeholder="Search for a product" autocomplete="off"> --}}
                                        {{-- <div class="search-results position-absolute bg-white  px-3 py-3 shadow" style="z-index: 99"></div> --}}
                                        <select class="product-search product-dropdown form-control form-control-sm select2" name="product_id[]">
                                            <!-- Options will be dynamically added here -->
                                        </select>
                                        

                                    </div>
                                </td>                                
                                <td><input type="text" name="pack_size[]" class="form-control form-control-sm" disabled></td>
                                <td><input type="text" name="last_purchase_price_pack[]" class="form-control form-control-sm" disabled></td>
                                <td><input type="text" name="last_purchase_price_unit[]" class="form-control form-control-sm" disabled></td>
                                <td><input type="text" name="pack_quantity[]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="pack_purchase_price[]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="unit_quantity[]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="unit_purchase_price[]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="bonus_pack[]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="bonus_unit[]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="percent_bonus[]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="amount[]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="last_sale_price_pack[]" class="form-control form-control-sm" disabled></td>
                                <td><input type="text" name="last_sale_price_unit[]" class="form-control form-control-sm" disabled></td>
                                <td><input type="text" name="margin[]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="new_sale_price_packet[]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="new_sale_price_unit[]" class="form-control form-control-sm"></td>
                                <td><button type="button" class="si si-plus btn btn-success" onclick="addProductRow()"></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row mt-3">
                    <div class="col-3 form-group">
                        <label for="discount_amount">Discount Amount</label>
                        <input type="text" name="discount_amount" id="discount_amount" class="form-control form-control-sm">
                    </div>
                    <div class="col-3 form-group">
                        <label for="discount_percent">Discount %</label>
                        <input type="text" name="discount_percent" id="discount_percent" class="form-control form-control-sm">
                    </div>
                        <div class="col-3 form-group">
                            <label for="tax_amount">Tax Amount</label>
                            <input type="text" name="tax_amount" id="tax_amount" class="form-control form-control-sm">
                        </div>
                        <div class="col-3 form-group">
                            <label for="tax_percent">Tax %</label>
                            <input type="text" name="tax_percent" id="tax_percent" class="form-control form-control-sm">
                        </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-3 form-group">
                        <label for="payable_amount">Total Payable Amount</label>
                            <input type="text" name="payable_amount" id="payable_amount" class="form-control form-control-sm" disabled>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" style="min-width: 220px">Save</button>
                    </div>
                </div>
            </form>
    </div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let productCount = 1;

    function addProductRow() {
        productCount++;
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${productCount}</td>
            <td><input type="text" name="product_id[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="pack_size[]" class="form-control form-control-sm" ></td>
            <td><input type="text" name="last_purchase_price_pack[]" class="form-control form-control-sm" disabled></td>
            <td><input type="text" name="last_purchase_price_unit[]" class="form-control form-control-sm" disabled></td>
            <td><input type="text" name="pack_quantity[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="pack_purchase_price[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="unit_quantity[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="unit_purchase_price[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="bonus_pack[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="bonus_unit[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="percent_bonus[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="amount[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="last_sale_price_pack[]" class="form-control form-control-sm" disabled></td>
            <td><input type="text" name="last_sale_price_unit[]" class="form-control form-control-sm" disabled></td>
            <td><input type="text" name="margin[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="new_sale_price_packet[]" class="form-control form-control-sm"></td>
            <td><input type="text" name="new_sale_price_unit[]" class="form-control form-control-sm"></td>
            <td><button type="button" onclick="addProductRow()" class="si si-plus btn btn-success"></button></td>
            <td><button type="button" onclick="removeProductRow(this)" class="si si-minus btn btn-danger"></button></td>
        `;

        document.getElementById('productTable').querySelector('tbody').appendChild(newRow);
    }

    function removeProductRow(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);

        // Renumber the rows
        const rows = document.getElementById('productTable').querySelector('tbody').getElementsByTagName('tr');
        for (let i = 0; i < rows.length; i++) {
            rows[i].getElementsByTagName('td')[0].textContent = i + 1;
        }

        productCount--;
    }
</script>
// Search Result Working 19-oct-2023
{{-- <script>
    $(document).ready(function () {
        // Handle input in the product search field
        $(document).on('input', '.product-search', function () {
            const query = $(this).val();
            const resultsContainer = $(this).siblings('.search-results');

            // Make an AJAX request to the search route
            $.ajax({
                url: '{{ route('products.search') }}',
                method: 'GET',
                data: {
                    query: query,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    // Clear previous results
                    resultsContainer.empty();

                    // Populate results container with new results
                    data.forEach(function (product) {
                        const resultItem = $('<div class="result-item">'+
                         '<table class="table table-bordered table-striped table-vcente">' + 
                            '<thead>' +
                                '<tr>' +
                                    '<th> Product Name </th>' +
                                    '<th> Pack Size </th>' +
                                    '<th> Current Quantity </th>' +
                                    '<th> Unit Purchase </th>' +
                                    '<th> Unit Sale </th>' +
                                '<tr>'+
                            '</thead>'+
                            '<tbody>'+
                                '<tr>'+
                                '<td>' + product.name + '</td>'+
                                '<td>' + product.pack_size + '</td>'+
                                '<td>' + product.current_quantity + '</td>'+
                                '<td>' + product.single_purchase_price + '</td>'+
                                '<td>' + product.single_sale_price + '</td>'+
                                '</tr>'+
                            '</tbody>'+
                          '</table>' + '</div>');

                        // Handle click on the result item
                        resultItem.on('click', function () {
                            // Set the selected product in the input field
                            const selectedInput = $(this).closest('.form-group').find('.product-search');
                            selectedInput.val(product.name);

                            // Fetch additional details for the selected product
                            $.ajax({
                                url: `{{ route('products.show', ['product' => '__productId__']) }}`.replace('__productId__', product.id),
                                method: 'GET',
                                success: function (productDetails) {
                                    // Populate other fields based on the product details
                                    selectedInput.closest('tr').find('[name="pack_size[]"]').val(productDetails.pack_size);
                                    selectedInput.closest('tr').find('[name="last_purchase_price_pack[]"]').val(productDetails.pack_purchase_price);
                                    selectedInput.closest('tr').find('[name="last_purchase_price_unit[]"]').val(productDetails.single_purchase_price);
                                    selectedInput.closest('tr').find('[name="last_sale_price_pack[]"]').val(productDetails.pack_sale_price);
                                    selectedInput.closest('tr').find('[name="last_sale_price_unit[]"]').val(productDetails.single_sale_price);
                                    // Populate other fields as needed
                                }
                            });

                            // Clear the results container
                            resultsContainer.empty();
                        });

                        resultsContainer.append(resultItem);
                    });
                }
            });
        });
    });
</script>
 --}}
 <script>
$(document).ready(function () {
    $('.product-search').select2({
        ajax: {
            url: '{{ route('products.search') }}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    query: params.term,
                    _token: '{{ csrf_token() }}'
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (product) {
                        return {
                            id: product.id,
                            text: product.name,
                            pack_size: product.pack_size,
                            last_purchase_price_pack: product.pack_purchase_price,
                            last_purchase_price_unit: product.single_purchase_price,
                            last_sale_price_pack: product.pack_sale_price,
                            last_sale_price_unit: product.single_sale_price,
                            // Add other properties as needed
                        };
                    })
                };
            },
            cache: true
        },
        placeholder: 'Search for a product',
        minimumInputLength: 1, // Minimum characters to start searching
    });

    // Handle the change event of the dropdown
    $('.product-search').on('select2:select', function (e) {
        const selectedData = e.params.data;
        const selectedRow = $(this).closest('tr');

        // Populate other fields based on the selected data
        selectedRow.find('[name="pack_size[]"]').val(selectedData.pack_size);
        selectedRow.find('[name="last_purchase_price_pack[]"]').val(selectedData.last_purchase_price_pack);
        selectedRow.find('[name="last_purchase_price_unit[]"]').val(selectedData.last_purchase_price_unit);
        selectedRow.find('[name="last_sale_price_pack[]"]').val(selectedData.last_sale_price_pack);
        selectedRow.find('[name="last_sale_price_unit[]"]').val(selectedData.last_sale_price_unit);
        // Add code to populate other fields as needed
    });
});

 </script>





