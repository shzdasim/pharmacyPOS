@extends('theme.theme')
@section('title')
    Edit Manufacturer
@endsection
@section('content')
<div class="container">
    <h2>Edit Manufacturer</h2>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('manufacturers.update', $manufacturer->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Manufacturer Name:</label>
                    <input type="text" name="name" class="form-control" required value="{{ $manufacturer->name }}" autofocus>
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- Add other form fields as needed -->
                <button type="submit" class="btn btn-alt-primary">Update Manufacturer</button>
            </form>
        </div>
    </div>
</div>
@endsection