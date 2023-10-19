@extends('theme.theme')
@section('title')
    Add Supplier
@endsection
@section('content')
    <div class="content">
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            <div class="form-group form-row">
                <div class="col-8">
                    <label for="name">Supplier Name</label>
                    <input type="text" name="name" id="name" autofocus placeholder="Supplier Name" class="form-control">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-3">
                    <label for="type">Supplier Type</label>
                    <select name="type" id="type" class="custom-select">
                        <option value="distribution" {{ old('type') === 'distribution' ? 'selected' : '' }}>Distribution</option>
                        <option value="drug store" {{ old('type') === 'drug store' ? 'selected' : '' }}>Drug Store</option>
                    </select>
                    @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-3">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" >
                    @error('phone_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-8">
                    <label for="address">Address:</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}" >
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-11">
                    <label for="account_number">Account Number:</label>
                    <input type="text" name="account_number" class="form-control" value="{{ old('account_number') }}" >
                    @error('account_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
           
            <button type="submit" class="btn btn-alt-primary">Create Supplier</button>
            </form>
    </div>
@endsection