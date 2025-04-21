@extends('Frontend.layout')
@section('frontend_content')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active text-white">Cart</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        @if(session('cart') && count(session('cart')) > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Products</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr>
                        {{-- <td><img src="{{ asset($item['image']) }}" class="rounded-circle" style="width: 80px; height: 80px;"></td> --}}
                        <td></td>
                        <td><p class="mt-4">{{ $item['name'] }}</p></td>
                        <td><p class="mt-4">${{ number_format($item['price'], 2) }}</p></td>
                        <td><p class="mt-4">{{ $item['quantity'] }}</p></td>
                        <td><p class="mt-4">${{ number_format($item['price'] * $item['quantity'], 2) }}</p></td>
                        <td>
                            <form action="{{ url('cart-remove/'.$id) }}" method="POST">
                                @csrf
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row g-4 justify-content-end mt-4">
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded p-4">
                    <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                    <div class="d-flex justify-content-between mb-4">
                        <h5>Subtotal:</h5>
                        <p>${{ number_format($total, 2) }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5>Shipping</h5>
                        <p>Flat rate: $3.00</p>
                    </div>
                    <div class="py-4 border-top border-bottom d-flex justify-content-between">
                        <h5>Total</h5>
                        <p>${{ number_format($total + 3, 2) }}</p>
                    </div>
<form action="{{ url('checkout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
</form>

                </div>
            </div>
        </div>
        @else
        <h3 class="text-center">Your cart is empty.</h3>
        @endif
    </div>
</div>
<!-- Cart Page End -->

@endsection
