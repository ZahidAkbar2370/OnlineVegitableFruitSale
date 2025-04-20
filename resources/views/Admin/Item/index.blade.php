@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header card-header-bg d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Items</h5>
            <a href="{{ url('create-item') }}" class="btn btn-primary btn-sm">Add Item</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Sale Price</th>
                        <th>Unit</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($posts) && !empty($posts))
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ Str::limit($post->content, 50) }}</td>
                                <td>
                                    <a href="{{ url('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ url('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                        @csrf 
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this post?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center">No posts found.</td></tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
        </div>

        {{-- <div class="card-footer text-end">
            {{ $posts->links() }}
        </div> --}}
    </div>
</div>
@endsection
