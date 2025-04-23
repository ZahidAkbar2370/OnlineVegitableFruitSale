@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Dashboard</h4>

    <div class="row">
        <!-- Total Customers -->
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-start border-primary border-4">
                <div class="card-body">
                    <h6>Total Customers</h6>
                    <h3>{{ $customerCount ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-start border-success border-4">
                <div class="card-body">
                    <h6>Total Orders</h6>
                    <h3>{{ $orderCount ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Items -->
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-start border-warning border-4">
                <div class="card-body">
                    <h6>Total Items</h6>
                    <h3>{{ $itemCount ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Categories -->
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-start border-danger border-4">
                <div class="card-body">
                    <h6>Total Categories</h6>
                    <h3>{{ $categoryCount ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
