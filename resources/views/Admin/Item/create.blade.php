@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header card-header-bg">
            <h5 class="mb-0">Create New Item</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ URL::to('store-item') }}">
                @csrf

                <div class="row">

                    <!-- Category -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-control" id="category">
                            <option value="active">Active</option>
                            <option value="inactive">In-Active</option>
                        </select>
                    </div>

                    <!-- Item Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <!-- Item Thumbnail -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control" required>
                    </div>

                    <!-- Item Sale Price -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Sale Price</label>
                        <input type="number" name="sale_price" class="form-control" required>
                    </div>

                    <!-- Item Unit -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Unit</label>
                        <input type="text" name="uni" placeholder="eg: 1kg, 10 pieces .." class="form-control" required>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-2">Save Change</button>
            </form>
        </div>
    </div>
</div>
@endsection
