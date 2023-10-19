@extends('theme.theme')
@section('title')
    Categories
@endsection
@section('category')
    active
@endsection
@section('content')
     <!-- Categories -->
     <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Categories</h3>
            <div class="block-options">
                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-alt-primary">Add Category <i class="si si-plus"></i></a>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <!-- Intro Category -->
            <table class="table table-striped table-borderless table-vcenter push">
                <thead class="border-bottom">
                    <tr>
                        <th colspan="2">Name</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 120px;">Edit</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 120px;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td class="text-center" style="width: 70px;">
                            <i class="si si-check"></i>
                        </td>
                        <td>
                            <a class="font-w600">{{ $category->name }}</a>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600 btn btn-small btn-alt-warning" href="{{ route('categories.edit', $category->id) }}">Edit <i class="far fa-edit"></i></a>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-sm btn-alt-danger"type="submit">Delete <i class="far fa-trash-alt"></i></button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- END Intro Category -->
        </div>
    </div>
    <!-- END Categories -->
@endsection