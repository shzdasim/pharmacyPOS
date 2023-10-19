@extends('theme.theme')
@section('title')
    Suppliers
@endsection
@section('product')
    active
@endsection
@section('content')
     <!-- Page Content -->
    <div class="content">
        <!-- Full Table -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">Products</h3>
                <div class="block-options">
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-alt-primary">
                        Add Products
                        <i class="si si-plus"></i>
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <div>
                        
                    </div>
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Manufacturer</th>
                                <th>Supplier</th>
                                <th>Pack Size</th>
                                <th>Current Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="productsTableBody">
                           @foreach ($products as $product)
                           <tr>
                           <td>
                            <a href="#" data-toggle="modal" data-target="#productDetailsModal{{ $product->id }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->manufacturer->name }}</td>
                        <td>{{ $product->supplier->name }}</td>
                        <td>{{ $product->pack_size }}</td>
                        <td>{{ $product->current_quantity }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-alt-primary" data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-alt-danger" data-toggle="tooltip" title="Delete">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                    </form>  
                                </div>
                            </td>
                        </tr>
                        <!-- Product Details Modal -->
                    <div class="modal fade" id="productDetailsModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productDetailsModalLabel">{{ $product->name }} Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Category:</strong> {{ $product->category->name }}</p>
                                    <p><strong>Manufacturer:</strong> {{ $product->manufacturer->name }}</p>
                                    <p><strong>Supplier:</strong> {{ $product->supplier->name }}</p>
                                    <p><strong>Pack Size:</strong> {{ $product->pack_size }}</p>
                                    <p><strong>Current Quantity:</strong> {{ $product->current_quantity }}</p>
                                    <!-- Add more details as needed -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                           @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
    
        <!-- END Full Table -->
@endsection
