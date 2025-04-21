@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header card-header-bg">
            <h5 class="mb-0">Edit Item</h5>
        </div>
        <div class="card-body">
            <!-- Update the action URL and method -->
            <form method="POST" action="{{ URL::to('update-item') }}" enctype="multipart/form-data">
                @csrf
                @method('POST') <!-- We will use POST and pass method override as hidden field -->

                <!-- Hidden field for the ID -->
                <input type="hidden" name="item_id" value="{{ $item->id }}">

                <div class="row">
                    <!-- Category -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-control" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Item Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $item->item_name }}" required>
                    </div>

                    <!-- Item Sale Price -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Sale Price</label>
                        <input type="number" name="sale_price" class="form-control" value="{{ $item->sale_price }}" required>
                    </div>

                    <!-- Item Unit -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Unit</label>
                        <input type="text" name="uni" placeholder="eg: 1kg, 10 pieces .." class="form-control" value="{{ $item->unit }}" required>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ $item->description }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-2">Update Item</button>
            </form>
        </div>
    </div>
</div>
@endsection
