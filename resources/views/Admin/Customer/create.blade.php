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

                    <!-- Password -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <!-- Publication Status -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Publication Status</label>
                        <select name="publication_status" class="form-control" id="publication_status">
                            <option value="active">Active</option>
                            <option value="inactive">In-Active</option>
                        </select>
                    </div>

                </div>

                <button type="submit" class="btn btn-success mt-2">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
