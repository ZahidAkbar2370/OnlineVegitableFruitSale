@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header card-header-bg">
            <h5 class="mb-0">Create New Customer</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ URL::to('store-customer') }}">
                @csrf

                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <!-- Mobile No -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mobile No</label>
                        <input type="number" name="mobile_no" class="form-control">
                    </div>

                    <!-- Password -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                </div>

                <button type="submit" class="btn btn-success mt-2">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
