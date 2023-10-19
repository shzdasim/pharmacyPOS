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
                                <th style="min-width:180px" class="text-success">This Invoice Purchase Price Packet</th>
                                <th style="min-width:190px" class="text-info">This Invoice Purchase Price unit</th>
                                <th style="min-width: 300px" class="text-primary">Bonuses</th>
                                <th style="min-width:120px"></th>
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
                                <th style="min-width:100px; font-size:10px" class="text-success">Price</th>
                                <th style="font-size:10px" class="text-info">Quantity</th>
                                <th style="min-width:100px; font-size:10px" class="text-info">Price</th>
                                <th style="min-width:100px; font-size:10px" class="text-primary">Packet</th>
                                <th style="min-width:100px; font-size:10px" class="text-primary">Unit</th>
                                <th style="min-width:100px; font-size:10px" class="text-primary">Disc %</th>
                                <th style="min-width:130px;font-size:10px">Amount</th>
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
                                        <select class="product-search product-dropdown form-control form-control-sm select2" name="product_id[]" onchange="handleProductChange(this)">
                                            <!-- Options will be dynamically added here -->
                                        </select>


                                    </div>
                                </td>                     
                                                                             {{-- PACK SIZE            --}}
                                <td><input type="text" name="pack_size[]" class="form-control form-control-sm" disabled></td>
                                                                             {{-- LAST PURCHASE PRICE PACKET            --}}
                                <td><input type="text" name="last_purchase_price_pack[]" class="form-control form-control-sm" disabled></td>
                                                                             {{-- LAST PURCHASE PRICE UNIT            --}}
                                <td><input type="text" name="last_purchase_price_unit[]" class="form-control form-control-sm" disabled></td>
                                                                             {{-- THIS INVOICE PURCHASE PRICE PACKET QUANTITY            --}}
                                <td><input type="text" name="pack_quantity[]" class="form-control form-control-sm" oninput="calculateUnitQuantity(this)"></td>
                                                                             {{-- THIS INVOICE PURCHASE PRICE PACKET PRICE            --}}
                                <td><input type="text" name="pack_purchase_price[]" class="form-control form-control-sm" oninput="calculateUnitPurchasePrice(this); calculateAmount(this)"></td>
                                                                             {{-- THIS INVOICE PURCHASE PRICE UNIT QUANITY            --}}
                                <td><input type="text" name="unit_quantity[]" class="form-control form-control-sm" oninput="calculatePackQuantity(this); calculatePackPurchasePrice(this)"></td>
                                                                             {{-- THIS INVOICE PURCHASE PRICE UNIT PRICE            --}}
                                <td><input type="text" name="unit_purchase_price[]" class="form-control form-control-sm" oninput="calculatePackPurchasePrice(this)"></td>
                                                                             {{-- BONUS PACKET            --}}
                                <td><input type="text" name="bonus_pack[]" class="form-control form-control-sm"></td>
                                                                             {{-- BONUS UNIT            --}}
                                <td><input type="text" name="bonus_unit[]" class="form-control form-control-sm"></td>
                                                                             {{-- BONUS %            --}}
                                <td><input type="text" name="percent_bonus[]" class="form-control form-control-sm"></td>
                                                                             {{-- TOTAL AMOUNT            --}}
                                <td><input type="text" name="amount[]" class="form-control form-control-sm" disabled></td>
                                                                             {{-- LAST SALE PRICES PACKET            --}}
                                <td><input type="text" name="last_sale_price_pack[]" class="form-control form-control-sm" disabled></td>
                                                                             {{-- LAST SALE PRICE UNIT            --}}
                                <td><input type="text" name="last_sale_price_unit[]" class="form-control form-control-sm" disabled></td>
                                                                             {{-- MARGIN            --}}
                                <td><input type="text" name="margin[]" class="form-control form-control-sm"></td>
                                                                             {{-- NEW SALE PRICE PACKET            --}}
                                <td><input type="text" name="new_sale_price_packet[]" class="form-control form-control-sm"></td>
                                                                             {{-- NEW SALE PRICE UNIT            --}}
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
// reset row
<script>
    function resetRow(row) {
        row.querySelector('[name="pack_size[]"]').value = '';
        row.querySelector('[name="last_purchase_price_pack[]"]').value = '';
        row.querySelector('[name="last_purchase_price_unit[]"]').value = '';
        row.querySelector('[name="pack_quantity[]"]').value = '';
        row.querySelector('[name="pack_purchase_price[]"]').value = '';
        row.querySelector('[name="unit_quantity[]"]').value = '';
        row.querySelector('[name="unit_purchase_price[]"]').value = '';
        row.querySelector('[name="bonus_pack[]"]').value = '';
        row.querySelector('[name="bonus_unit[]"]').value = '';
        row.querySelector('[name="percent_bonus[]"]').value = '';
        row.querySelector('[name="amount[]"]').value = '';
        row.querySelector('[name="last_sale_price_pack[]"]').value = '';
        row.querySelector('[name="last_sale_price_unit[]"]').value = '';
        row.querySelector('[name="margin[]"]').value = '';
        row.querySelector('[name="new_sale_price_packet[]"]').value = '';
        row.querySelector('[name="new_sale_price_unit[]"]').value = '';
        // ... (reset other fields as needed)
    }
    function handleProductChange(select) {
        const row = select.closest('tr');
        // Reset the row only when a new product is selected
        if (select.value !== row.getAttribute('data-selected-product')) {
            resetRow(row);
            row.setAttribute('data-selected-product', select.value);
        }
        // ... (other logic for handling product change)
    }
</script>

// Calculate Pack Quntity and Unit Quantity
<script>
        function calculateUnitQuantity(input) {
        const row = input.closest('tr');
        const packQuantity = parseFloat(input.value) || 0;
        const packSize = parseFloat(row.querySelector('[name="pack_size[]"]').value) || 1;
        const unitQuantityInput = row.querySelector('[name="unit_quantity[]"]');
        const unitQuantity = packQuantity * packSize;
        unitQuantityInput.value = isNaN(unitQuantity) ? '' : unitQuantity;
        
    }

    function calculatePackQuantity(input) {
        const row = input.closest('tr');
        const unitQuantity = parseFloat(input.value) || 0;
        const packSize = parseFloat(row.querySelector('[name="pack_size[]"]').value) || 1;
        const packQuantityInput = row.querySelector('[name="pack_quantity[]"]');
        const packQuantity = unitQuantity / packSize;
        packQuantityInput.value = isNaN(packQuantity) ? '' : packQuantity;
       
    }
</script>

// calculate Pack Purchase Price and Unit Purchase Price
<script>
     function calculateUnitPurchasePrice(input) {
    const row = input.closest('tr');
    const packPurchasePrice = parseFloat(input.value) || 0;
    const packQuantity = parseFloat(row.querySelector('[name="pack_quantity[]"]').value) || 1;
    const unitQuantity = parseFloat(row.querySelector('[name="unit_quantity[]"]').value) || 1;
    const unitPurchasePriceInput = row.querySelector('[name="unit_purchase_price[]"]');
    const unitPurchasePrice = packPurchasePrice * packQuantity/ unitQuantity;
    unitPurchasePriceInput.value = isNaN(unitPurchasePrice) ? '' : unitPurchasePrice.toFixed(2);

}
    function calculatePackPurchasePrice(input) {
        const row = input.closest('tr');
        const unitPurchasePrice = parseFloat(row.querySelector('[name="unit_purchase_price[]"]').value) || 0;
        const unitQuantity = parseFloat(row.querySelector('[name="unit_quantity[]"]').value) || 1;
        const packPurchasePriceInput = row.querySelector('[name="pack_purchase_price[]"]');
        const packPurchasePrice = unitPurchasePrice * unitQuantity;
        packPurchasePriceInput.value = isNaN(packPurchasePrice) ? '' : packPurchasePrice.toFixed(2);
        
    }

</script>

// Calculate Amount
<script>
    function calculateAmount(input) {
    const row = input.closest('tr');
    const packQuantity = parseFloat(row.querySelector('[name="pack_quantity[]"]').value) || 0;
    const packPurchasePrice = parseFloat(row.querySelector('[name="pack_purchase_price[]"]').value) || 0;
    const amountInput = row.querySelector('[name="amount[]"]');
    const amount = packQuantity * packPurchasePrice;
    amountInput.value = isNaN(amount) ? '' : amount.toFixed(2);
   
}

</script>

