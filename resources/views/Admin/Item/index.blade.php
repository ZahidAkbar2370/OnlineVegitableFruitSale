@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header card-header-bg d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Items</h5>
            <a href="{{ url('create-item') }}" class="btn btn-primary btn-sm">Add Item</a>
        </div>

        <div class="card-body">

           @if(Session::has('message'))
                <div class="alert alert-info" id="flash-message">
                    {{ Session::get('message') }}
                </div>
            @endif

            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Sale Price</th>
                        <th>Unit</th>
                        <th>Thumbnail</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($items) && $items->count())
                        @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->category->category_name ?? 'N/A' }}</td>
                                <td>{{ $item->sale_price }}</td>
                                <td>{{ $item->unit }}</td>
                               <td><img src="{{ asset($item->item_thumbnail ?? 'uploads/items/default.png') }}" style="width: 50px; height: 50px; object-fit: cover;" alt=""></td>
                                <td>{{ Str::limit($item->description, 50) }}</td>
                                <td>{{ $item->created_at->format('Y-m-d h:i:s') }}</td>
                                <td>
                                    <a href="{{ url('edit-item', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ url('delete-item', $item->id) }}" onclick="return confirm('Delete this Item?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="8" class="text-center">No Items Found.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- <div class="card-footer text-end">
            {{ $items->links() }}
        </div> --}}
    </div>
</div>
@endsection
