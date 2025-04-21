@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header card-header-bg d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Orders</h5>
            <span class="btn btn-primary btn-sm">Total: {{ !empty($orders) ? count($orders) : 0 }}</span>
        </div>

        <div class="card-body">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Item</th>
                        <th>Sale Price</th>
                        <th>Unit</th>
                        <th>Status</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(isset($orders) && !empty($orders))
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <strong>{{ $order->customerDetail->name ?? 'Customer Deleted' }}</strong><br>
                                    <small>{{ $order->customerDetail->email ?? '' }}</small>
                                </td>

                                <td>
                                    <strong>{{ $order->itemDetail->item_name ?? 'Item Deleted' }}</strong><br>
                                    <small>{{ Str::limit($order->itemDetail->description ?? '', 50) }}</small>
                                </td>
                                <td>{{ env('currencySymbol') }} - {{ $order->sale_price }}</td>
                                <td>{{ $order->unit }}</td>
                                <td>{{ $order->status }}</td>
                                {{-- <td> --}}
                                    {{-- <a href="{{ url('edit-order', $order->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                                    {{-- <a href="{{ url('delete-order', $order->id) }}" class="btn btn-sm btn-danger">Delete</a> --}}
                                {{-- </td> --}}
                            </tr>
                        @endforeach
                        @else
                            <tr><td colspan="7" class="text-center">No Order Found.</td></tr>
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
