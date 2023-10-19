@extends('theme.theme')
@section('title')
    Suppliers
@endsection
@section('supplier')
    active
@endsection
@section('content')
     <!-- Page Content -->
     <div class="content">
        <!-- Full Table -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">Suppliers</h3>
                <div class="block-options">
                    <a href="{{ route('suppliers.create') }}" class="btn btn-sm btn-alt-primary">
                        Add Suppliers
                        <i class="si si-plus"></i>
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th style="width: 15%;">Type</th>
                                <th style="width: 15%;">Phone Number</th>
                                <th style="width: 15%;">Address</th>
                                <th style="width: 15%;">Account Number</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($suppliers as $supplier)
                           <tr>
                            <td class="font-w600 font-size-sm">
                               {{$supplier->name}}
                            </td>
                            <td class="font-w600 font-size-sm">
                                {{ $supplier->type }}
                            </td>
                            <td class="font-size-sm">{{ $supplier->phone_number }}</td>
                            <td>
                                {{ $supplier->address }}
                            </td>
                            <td>
                                {{ $supplier->account_number }}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-alt-primary" data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="post">
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
        <!-- END Full Table -->
@endsection