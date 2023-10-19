@extends('theme.theme')
@section('title')
    Create Category
@endsection
@section('content')
<div class="container">
    <h2>Create Category</h2>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name:</label>
                    <input type="text" name="name" class="form-control" required autofocus>
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- Add other form fields as needed -->
                <button type="submit" class="btn btn-alt-primary">Create Category</button>
            </form>
        </div>
    </div>
</div>
@endsection