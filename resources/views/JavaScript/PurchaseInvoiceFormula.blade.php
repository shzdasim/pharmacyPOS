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
        // Populate last fields
        selectedRow.find('[name="pack_size[]"]').val(selectedData.pack_size);
        selectedRow.find('[name="last_purchase_price_pack[]"]').val(selectedData.last_purchase_price_pack);
        selectedRow.find('[name="last_purchase_price_unit[]"]').val(selectedData.last_purchase_price_unit);
        selectedRow.find('[name="last_sale_price_pack[]"]').val(selectedData.last_sale_price_pack);
        selectedRow.find('[name="last_sale_price_unit[]"]').val(selectedData.last_sale_price_unit);
        // Populate now fields
        selectedRow.find('[name="pack_purchase_price[]"]').val(selectedData.last_purchase_price_pack);
        selectedRow.find('[name="unit_purchase_price[]"]').val(selectedData.last_purchase_price_unit);
        selectedRow.find('[name="new_sale_price_packet[]"]').val(selectedData.last_sale_price_pack);
        selectedRow.find('[name="last_sale_price_unit[]"]').val(selectedData.last_sale_price_unit);
        // Add code to populate other fields as needed
    });
});

 </script>
{{-- // reset row --}}
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


{{--  Calculate Pack Quntity and Unit Quantity --}}
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

{{--  calculate Pack Purchase Price and Unit Purchase Price --}}
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

{{-- Calculate Amount --}}
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

{{-- Calculate New Sale Price Packet and New Sale Price Unit --}}
<script>
    function calculateNewSalePricePacket(input) {
    const row = input.closest('tr');
    const newSalePriceUnit = parseFloat(row.querySelector('[name="new_sale_price_unit[]"]').value) || 0;
    const packQuantity = parseFloat(row.querySelector('[name="pack_quantity[]"]').value) || 1;
    const unitQuantity = parseFloat(row.querySelector('[name="unit_quantity[]"]').value) || 1;
    const newSalePricePacketInput = row.querySelector('[name="new_sale_price_packet[]"]');
    
    // Calculate new sale price packet
    const newSalePricePacket = newSalePriceUnit * unitQuantity / packQuantity;
    
    newSalePricePacketInput.value = isNaN(newSalePricePacket) ? '' : newSalePricePacket.toFixed(2);
}

    function calculateNewSalePriceUnit(input) {
        const row = input.closest('tr');
        const newSalePricePacket = parseFloat(row.querySelector('[name="new_sale_price_packet[]"]').value) || 0;
        const packQuantity = parseFloat(row.querySelector('[name="pack_quantity[]"]').value) || 1;
        const unitQuantity = parseFloat(row.querySelector('[name="unit_quantity[]"]').value) || 1;
        const newSalePriceUnitInput = row.querySelector('[name="new_sale_price_unit[]"]');
        const newSalePriceUnit = newSalePricePacket * packQuantity/ unitQuantity;
        newSalePriceUnitInput.value = isNaN(newSalePriceUnit) ? '' : newSalePriceUnit.toFixed(2);
    }
    
</script>
