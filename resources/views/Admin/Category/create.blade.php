@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header card-header-bg">
            <h5 class="mb-0">Create New Category</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ URL::to('store-category') }}">
                @csrf

                <div class="row">
                    <!-- Category Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="category_name" class="form-control" required>
                    </div>

                    <!-- Thumbnail -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-2">Save Change</button>
            </form>
        </div>
    </div>
</div>
@endsection
