@extends('Frontend.layout')
@section('frontend_content')

 <!-- Checkout Page Start -->
 <div class="container-fluid" style="margin-top: 120px !important">
    <div class="container py-5">
        <form action="{{ URL::to('update-profile') }}" method="post">
            @csrf
            <div class="row">
                <h1 class="mb-4">Profile</h1>
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Name<sup>*</sup></label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Mobile #<sup>*</sup></label>
                                <input type="text" name="mobile_no" value="{{ Auth::user()->mobile_no }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Email<sup>*</sup></label>
                        <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="form-item my-3">
                        <button type="submit" class="btn btn-success btn-sm">Save Change</button>

                        <a href="{{ url('logout') }}" class="btn btn-danger btn-sm">Logout</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->

@endsection