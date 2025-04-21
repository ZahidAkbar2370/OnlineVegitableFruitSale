@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Category</h5>
            <a href="{{ url('categories') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <div class="card-body">
            <form action="{{ url('update-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $category->id }}">

                <div class="mb-3">
                    <label>Category Name</label>
                    <input type="text" name="category_name" value="{{ old('category_name', $category->category_name) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Thumbnail (optional)</label>
                    <input type="file" name="thumbnail" class="form-control">
                    <img src="{{ asset($category->category_thumbnail) }}" style="width: 60px; height: 60px; object-fit: cover; margin-top: 5px;">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
