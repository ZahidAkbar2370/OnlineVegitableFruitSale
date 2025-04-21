@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header card-header-bg d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Customers</h5>
            <a href="{{ url('create-customer') }}" class="btn btn-primary btn-sm">Add Customer</a>
        </div>

        <div class="card-body">
            
            @if(Session::has('message'))
                <div class="alert alert-info">
                    {{ Session::get('message') }}
                </div>
            @endif

            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile #</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($customers) && !empty($customers))
                        @foreach ($customers as $key => $customer)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->mobile_no ?? '--' }}</td>
                                <td><span class="text-uppercase">{{ $customer->created_at->format('Y-m-d h:i:s') }}</span></td>
                                {{-- <td>{{ Str::limit($post->content, 50) }}</td> --}}
                                <td>
                                    <a href="{{ url('edit-customer', $customer->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ url('delete-customer', $customer->id) }}" onclick="return confirm('Delete this Customer?')" class="btn btn-sm btn-danger">Delete</a>
                                    {{-- <form action="{{ url('delete-customer', $customer->id) }}" method="POST" style="display:inline;">
                                        @csrf 
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this post?')">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr><td colspan="6" class="text-center">No Customer Found.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="card-footer text-end">
            {{ $customers->links() }}
        </div>
    </div>
</div>
@endsection
