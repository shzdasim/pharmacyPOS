@extends('theme.theme')
@section('title')
    Purchase Invoice
@endsection
@section('purchase_invoice')
    active
@endsection
@section('content')
         <!-- Page Content -->
         <div class="content">
            <!-- Full Table -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Purchase Invoice</h3>
                    <div class="block-options">
                        <a href="{{ route('purchase-invoices.create') }}" class="btn btn-sm btn-alt-primary">
                            Add Invoice
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
                                    <th>Invoice Number</th>
                                    <th>Date</th>
                                    <th>Supplier</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="productsTableBody">
                               @foreach ($purchaseInvoices as $invoice)
                               <tr>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>{{ $invoice->invoice_date }}</td>
                                <td>{{ $invoice->supplier->name }}</td>
                                <td>{{ $invoice->total_amount }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('purchase-invoices.edit', $invoice->id) }}" class="btn btn-sm btn-alt-primary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('purchase-invoices.destroy', $invoice->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-alt-danger" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                        </form>  
                                    </div>
                                </td>
                            </tr>
                            
                               @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        
            <!-- END Full Table -->
@endsection