@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header card-header-bg d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Categories</h5>
            <a href="{{ url('create-category') }}" class="btn btn-primary btn-sm">Add Category</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Thumbnail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($categories) && !empty($categories))
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td><img src="{{ asset($category->category_thumbnail) }}" style="width: 60px; height: 60;" alt=""></td>
                                <td>
                                    <a href="{{ url('edit-category', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ url('delete-category', $category->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete this Category?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr><td colspan="4" class="text-center">No Category Found.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="card-footer text-end">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
