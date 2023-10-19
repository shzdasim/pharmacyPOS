@extends('theme.theme')
@section('title')
    Add Product
@endsection
@section('product')
    active
@endsection
@section('content')
    <div class="content">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group form-row">
                <div class="col-6">
                    <label for="name">Product Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" autofocus placeholder="Product Name" class="form-control">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-5">
                    <label for="formulation">Product Formulation</label>
                    <input type="text" name="formulation" id="formulation"  placeholder="Product Formulation" class="form-control">
                    @error('formulation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-11">
                    <label for="description">Product Description</label>
                    <input type="text" name="description" id="description" placeholder="Product description" class="form-control">
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-3">
                    <label for="category_id">Category:<span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="manufacturer_id">Manufacturer:<span class="text-danger">*</span></label>
                    <select name="manufacturer_id" id="manufacturer_id" class="form-control">
                        @foreach ($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="supplier_id">Supplier:</label>
                    <select name="supplier_id" id="supplier_id" class="form-control">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="pack_size">Pack Size:<span class="text-danger">*</span></label>
                    <input type="number" id="pack_size" name="pack_size" class="form-control" value="{{ old('pack_size') }}" >
                    @error('pack_size')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-8">
                    <label for="product_barcode">Product Barcode:</label>
                <input type="text" name="product_barcode" class="form-control" value="{{ old('product_barcode') }}" >
                @error('product_barcode')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-8">
                    <label for="location">Product Location:</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location') }}" >
                    @error('location')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3" style="margin-top:35px">
                    <div class="custom-control custom-switch custom-control-warning">
                        <input type="checkbox" class="custom-control-input" id="example-sw-custom-success1" name="narcotics_lock" value="1">
                        <label class="custom-control-label" for="example-sw-custom-success1">Narcotics</label>
                    </div>
                </div>
            </div>
           <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th>Current Quantity</th>
                        <th>Pack Purchase Price</th>
                        <th>Single Purchase Price</th>
                        <th>Pack Avg Purchase Price</th>
                        <th>Pack Sale Price</th>
                        <th>Single Sale Price</th>
                        <th>Single Avg Sale Price</th> 
                        <th>Margin</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="form-group">
                            <input type="text" id="current_quantity" name="current_quantity" class="form-control" disabled >
                        </td>
                        <td class="form-group">
                            <input type="text" id="pack_purchase_price" name="pack_purchase_price" class="form-control" >
                        </td>
                        <td class="form-group">
                            <input type="text" id="single_purchase_price"  name="single_purchase_price" class="form-control">
                        </td>
                        <td class="form-group">
                            <input type="text" id="pack_avg_purchase_price" name="pack_avg_purchase_price" class="form-control">
                        </td>
                        <td class="form-group">
                            <input type="text" id="pack_sale_price" name="pack_sale_price" class="form-control">
                        </td>
                        <td class="form-group">
                            <input type="text" id="single_sale_price" name="single_sale_price" class="form-control">
                        </td>
                        <td class="form-group">
                            <input type="text" id="single_avg_sale_price" name="single_avg_sale_price" class="form-control">
                        </td>
                        <td class="form-group">
                            <input type="text" id="margin" name="margin" class="form-control" disabled>
                        </td>

                    </tr>
                </tbody>
            </table>
           </div>
            <button type="submit" class="btn btn-alt-primary">Create Product</button>
            </form>
    </div>
@endsection


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Your form code -->

<script>
    $(document).ready(function() {
        // Variables to store total quantities and total prices
        var totalQuantityPurchase = 0;
        var totalPackPricePurchase = 0;

        var totalQuantitySale = 0;
        var totalSinglePriceSale = 0;

        // Event listener for changes in pack size, pack purchase price, and quantity
        $('#pack_size, #pack_purchase_price, #quantity').on('input', function() {
            calculateSinglePurchasePrice();
            calculatePackAveragePurchasePrice();
        });

        // Event listener for changes in pack size, pack sale price, and quantity
        $('#pack_size, #pack_sale_price, #quantity').on('input', function() {
            calculateSingleSalePrice();
            calculateSingleAverageSalePrice();
        });

        // Event listener for changes in single purchase price
        $('#single_purchase_price').on('input', function() {
            calculatePackAveragePurchasePrice();
            calculateSingleAverageSalePrice(); // Add this line
        });

        // Event listener for changes in single sale price
        $('#single_sale_price').on('input', function() {
            calculateSingleAverageSalePrice();
            calculatePackAveragePurchasePrice(); // Add this line
        });

        // Function to calculate single item purchase price
        function calculateSinglePurchasePrice() {
            var packSize = parseFloat($('#pack_size').val()) || 1;
            var packPurchasePrice = parseFloat($('#pack_purchase_price').val()) || 0;

            var singlePurchasePrice = packPurchasePrice / packSize;

            $('#single_purchase_price').val(singlePurchasePrice.toFixed(2));
        }



        // Function to calculate single item sale price
        function calculateSingleSalePrice() {
            var packSize = parseFloat($('#pack_size').val()) || 1;
            var packSalePrice = parseFloat($('#pack_sale_price').val()) || 0;

            var singleSalePrice = packSalePrice / packSize;

            $('#single_sale_price').val(singleSalePrice.toFixed(2));
        }


    });
</script>
