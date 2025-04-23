@extends('Frontend.layout')
@section('frontend_content')
    

<!-- Fruits Shop Start-->
<div class="container-fluid fruite mt-5" style="margin-top: 120px !important">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Our Organic Items</h1>
                </div>
            </div>
            <ddiv class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($items as $item)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset($item->item_thumbnail)}}" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $item->category->category_name ?? 'No-Category' }}</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{ $item->item_name }}</h4>
                                                <p>{{ Str::limit($item->description ?? '', 50) }}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0"><small>{{ env('currencySymbol') }}</small>{{ $item->sale_price }} / {{ $item->unit }}g</p>
                                                    <a href="{{ url('add-to-cart', $item->id) }}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
<!-- Fruits Shop End-->



@endsection